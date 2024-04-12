<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream and Make - Core Values</title>
    <link rel="icon" href="Logo\logo.png">
    <style>
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="Logo/logo.png" alt="Logo">
            <h1>Dream and Make</h1>
            <link rel="icon" href="Logo\logo.png">
        </div>
        <nav>
            <ul class="content__container__list">
            <li class="content__container__list__item"><a href="inicio.php">Explorar</a></li>
                <li class="content__container__list__item"><a href="galeria.php">Galeria</a></li>
                <li class="content__container__list__item"><a href="novamusica.php">Musicas</a></li>
                <li class="content__container__list__item"><a href="sla.php">Envie sua arte</a></li>
                <li class="content__container__list__item"><a href="faq.php">FAQ</a></li>
                <li class="content__container__list__item"><a href="ajuda.php">Ajuda</a></li>
                <li class="content__container__list__item"><a href="corevalues.php">Core Values</a></li>
                <li class="content__container__list__item"><a href="crievcmsm.php">Crie Você</a></li>
                <li class="content__container__list__item"><a href="sobre.php">Sobre Nós</a></li>
            </ul>
        </nav>
    </header>
    <div class="image-container">
        <?php
        $dir = 'Core Values'; // Substitua pelo caminho da sua pasta de imagens
        $images = scandir($dir);

        foreach ($images as $image) {
            if (in_array($image, array('.', '..'))) {
                continue;
            }

            echo '<img src="' . $dir . '/' . $image . '" alt="Imagem">';
        }
        ?>
    </div>
    <div class="celebrate-phrase">
        Celebrando a Arte, Elevando Vozes...
    </div>    
</body>
</html>
