<?php
// Conexão com o banco de dados
$connection = mysqli_connect("127.0.0.1", "root", "angelo", "baiano");

if (!$connection) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Verifica se foi enviado um arquivo
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "Imagens/";
        $fileName = basename($_FILES['image']['name']);
        $targetPath = $targetDir . $fileName;

        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            // Insere o caminho da imagem e o nome na tabela Images
            $query_insert_image = "INSERT INTO Images (image_path, image_name) VALUES ('$targetPath', '$name')";

            if (mysqli_query($connection, $query_insert_image)) {
                echo "Imagem enviada com sucesso!";
            } else {    
                echo "Erro ao inserir caminho da imagem no banco de dados: " . mysqli_error($connection);
            }
        } else {
            echo "Erro ao mover a imagem para o diretório de destino.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="icon" href="Logo\logo.png">
<title>Dream and Make - Envio</title>
    <title>Dream and Make</title>
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
    <div class="image-container">
        <h1>Enviar Imagem</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="image" accept="image/*" required>
            <input type="text" name="name" placeholder="Coloque Seu @ do insta ou telefone de contato" required>
            <button type="submit" name="submit">Enviar</button>
        </form>
    </div>
    <div class="celebrate-phrase">
        Celebrando a Arte, Elevando Vozes...
    </div>    
</body>
</html>
