<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream and Make - Galeria</title>
    <link rel="icon" href="Logo\logo.png">
</head>

<body>
    <header>
        <div class="logo">
            <img src="Logo\logo.png" alt="Logo">
            <h1>Dream and Make</h1>
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

    <?php
$connection = mysqli_connect("127.0.0.1", "root", "angelo", "baiano");

if (!$connection) {
    die("Erro na conexão: " . mysqli_connect_error());
}

$query = "SELECT DISTINCT image_name FROM Images";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $image_name = $row['image_name'];

        echo '<div class="author-container">';
        echo '<div class="author">' . $image_name . '</div>';

        $query_images = "SELECT * FROM Images WHERE image_name = '$image_name'";
        $result_images = mysqli_query($connection, $query_images);

        if ($result_images && mysqli_num_rows($result_images) > 0) {
            echo '<div class="image-container">';
            while ($row_image = mysqli_fetch_assoc($result_images)) {
                $image_id = $row_image['id']; // Captura o ID da imagem
                $image_path = $row_image['image_path']; // Captura o caminho da imagem

                // Adiciona um link que abre a imagem ampliada em uma nova janela
                echo '<a class="image" href="#" onclick="openOverlay(\'' . $image_path . '\'); return false;">';
                echo '<img src="' . $image_path . '" alt="Imagem">';
                echo '</a>'; // Closing image link
            }
            echo '</div>'; // Closing image-container div
        }

        echo '</div>'; // Closing author-container div
    }
} else {
    echo 'Nenhuma imagem encontrada.';
}
?>

    <script>
    function openOverlay(imagePath) {
        const overlay = document.createElement('div');
        overlay.classList.add('overlay');

        const enlargedImage = document.createElement('img');
        enlargedImage.src = imagePath;
        enlargedImage.alt = 'Imagem Ampliada';

        overlay.appendChild(enlargedImage);
        document.body.appendChild(overlay);

        overlay.addEventListener('click', () => {
            overlay.remove();
        });
    }
    </script>
    <div class="celebrate-phrase">
        Celebrando a Arte, Elevando Vozes...
    </div>
</body>

</html>