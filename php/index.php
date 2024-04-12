<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Logo\logo.png">
    <title>Bem-Vindo(a) ao Dream and Make</title>
    <link rel="stylesheet" href="../css/index.css"
    <?php
    $imageFolder = 'corevalues'; // Substitua pelo nome da sua pasta de imagens
    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Extensões de imagem permitidas
    
    // Obtém uma lista de arquivos na pasta
    $files = scandir($imageFolder);

    // Filtra apenas os arquivos de imagem
    $imageFiles = array_filter($files, function ($file) use ($imageExtensions) {
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        return in_array($extension, $imageExtensions);
    });

    // Escolhe uma imagem aleatória
    $randomImage = $imageFiles[array_rand($imageFiles)];
    ?>
    <style>
        /* Aplica a imagem de fundo */
        body {
            background-image: url('<?php echo $imageFolder . "/" . $randomImage; ?>');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        @media (max-width: 768px) {

            /* Estilos para telas menores que 768px de largura */
            body {
                background-size: contain;
            }
        }
    </style>
</head>

<body>
    <div class="dark-overlay"></div>
    <div class="welcome-container">
        <h1>Bem-Vindo(a) ao Dream and Make</h1>
        <p>Celebrando a Arte, Elevando Vozes..</p>
        <a class="button" href="regras.php">Regras</a>
    </div>

</body>

</html>