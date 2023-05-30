<?php

require __DIR__ . '/vendor/autoload.php'; // remove this line if you use a PHP Framework.

use Orhanerday\OpenAi\OpenAi;

$open_ai_key = 'tu_api';
$open_ai = new OpenAi($open_ai_key);

$prompt = $_POST['prompt'];

$complete = $open_ai->completion([
    'model' => 'text-davinci-003',
    'prompt' => "dame una descripcion de video para tiktok sobre". $prompt. " tambien incluye hashtags",
    'temperature' => 0.9,
    'max_tokens' => 150,
    'frequency_penalty' => 0,
    'presence_penalty' => 0.6,
 ]);

 $response = json_decode($complete, true);
 $response = $response["choices"][0]["text"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Respuesta generada</h1>

           
            <div class="card-response">
                <p><?= $response?></p>
            </div>
            

</main>
</body>
</html>