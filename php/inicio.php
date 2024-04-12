<?php
include("php-func\conexaofunc.php");

if (isset($_POST['submit_comment'])) {
    $image_id = mysqli_real_escape_string($connection, $_POST['image_id']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $comment = mysqli_real_escape_string($connection, $_POST['comment']);

    $query_check_image = "SELECT id FROM imagens WHERE id = '$image_id'";
    $result_check_image = mysqli_query($connection, $query_check_image);

    if (!$result_check_image || mysqli_num_rows($result_check_image) == 0) {
        echo "Erro: Imagem não encontrada.";
    } else {
        $query_insert_comment = "INSERT INTO comentarios (image_id, nome, comentario, timestamp) VALUES ('$image_id', '$name', '$comment', NOW())";

        if (!mysqli_query($connection, $query_insert_comment)) {
            echo "Erro ao adicionar o comentário: " . mysqli_error($connection);
        }
    }
}

$query = "SELECT * FROM imagens ORDER BY RAND() LIMIT 1";
$result = mysqli_query($connection, $query);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Logo\logo.png">
    <title>Dream and Make - Explorar</title>
    <link rel="stylesheet" href="../css/inicio.css">
</head>
<body>
    <header>
        <!-- Logo e navegação -->
        <div class="logo">
            <img src="Logo\logo.png" alt="Logo">
            <h1>Dream and Make</h1>
        </div>
        <nav>
            <ul class="content__container__list">
                <!-- Lista de links de navegação -->
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
    <div class="image-comments-container">
        <div class="image-container">
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                

                echo '<div class="image">';
                echo '<img src="' . $row['arquivo_path'] . '" alt="Imagem" class="centered-image">';
                echo '<p>Enviado Por: <span class="author-name">' . $row['nome'] . '</span></p>';
                echo '<form method="POST" class="comment-form">';
                echo '<input type="hidden" name="image_id" value="' . $row['id'] . '">';
                echo '<input type="text" name="name" placeholder="Qual seu nome?" class="comment-input">';
                echo '<textarea name="comment" placeholder="Qual sentimento essa pintura ou imagem te transmite?, Oque vc achou dessa pintura?" class="comment-textarea"></textarea>';
                echo '<div class="button-container">';
                echo '<button class="comment-button" type="submit" name="submit_comment">Enviar</button>';
                echo '<button class="change-image-button" onclick="changeImage()">Mudar Imagem</button>';
                echo '</div>';
                echo '</form>';
                echo '</div>'; // Fechamento da div da imagem
            } else {
                echo 'Nenhuma imagem encontrada.';
            }
            ?>
        </div>
        <div class="comments-section">
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                $query_comments = "SELECT * FROM comentarios WHERE image_id = '{$row['id']}' ORDER BY timestamp DESC";
                $result_comments = mysqli_query($connection, $query_comments);

                if ($result_comments && mysqli_num_rows($result_comments) > 0) {
                    echo '<div class="comments-section">';
                    while ($row_comment = mysqli_fetch_assoc($result_comments)) {
                        echo '<div class="comment">';
                        echo '<p class="comment-author">' . $row_comment['nome'] . '</p>';
                        echo '<p class="comment-text">' . $row_comment['comentario'] . '</p>';
                        echo '<p class="comment-timestamp">' . $row_comment['timestamp'] . '</p>';
                        echo '</div>';
                    }
                    echo '</div>';
                } else {
                    echo '<p>Nenhum comentário encontrado.</p>';
                }
            }
            ?>
        </div>
    </div>
    <div class="celebrate-phrase">
        Celebrando a Arte, Elevando Vozes...
    </div>
</body>
</html>
