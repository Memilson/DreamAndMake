<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Logo\logo.png">
    <title>Dream and Make - Músicas</title>
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
                <li class="content__container__list__item"><a href="novamusica.php">Músicas</a></li>
                <li class="content__container__list__item"><a href="sla.php">Envie sua arte</a></li>
                <li class="content__container__list__item"><a href="faq.php">FAQ</a></li>
                <li class="content__container__list__item"><a href="ajuda.php">Ajuda</a></li>
                <li class="content__container__list__item"><a href="corevalues.php">Core Values</a></li>
                <li class="content__container__list__item"><a href="crievcmsm.php">Crie Você</a></li>
                <li class="content__container__list__item"><a href="sobre.php">Sobre Nós</a></li>
            </ul>
        </nav>
    </header>
    <div>
        <form method="POST" enctype="multipart/form-data">
            <label for="musica">Selecione uma música:</label>
            <input type="file" name="musica" id="musica">
            <label for="musica_name">Coloque seu @ do Instagram ou telefone de contato:</label>
            <input type="text" name="musica_name" id="musica_name" placeholder="Digite aqui">
            <button type="submit" name="submit">Enviar Música</button>
        </form>

        <div class="music-section">
            <?php
            // Conexão com o banco de dados
            $connection = mysqli_connect("127.0.0.1", "root", "angelo", "baiano");

            if (!$connection) {
                die("Erro na conexão: " . mysqli_connect_error());
            }

            // Verifica se foi enviado um arquivo
            if (isset($_POST['submit'])) {
                if ($_FILES['musica']['error'] === UPLOAD_ERR_OK) {
                    $targetDir = "Music/";
                    $fileName = basename($_FILES['musica']['name']);
                    $targetPath = $targetDir . $fileName;

                    // Move o arquivo para o diretório de destino
                    if (move_uploaded_file($_FILES['musica']['tmp_name'], $targetPath)) {
                        // Obtém o nome da música do formulário
                        $musicaName = mysqli_real_escape_string($connection, $_POST['musica_name']);

                        // Insere o caminho da música e o nome na tabela Musica
                        $query_insert_music = "INSERT INTO musica (musica, musica_name) VALUES ('$targetPath', '$musicaName')";

                        if (mysqli_query($connection, $query_insert_music)) {
                            echo '<p class="success-message">Música enviada com sucesso!</p>';
                        } else {
                            echo '<p class="error-message">Erro ao inserir caminho da música no banco de dados: ' . mysqli_error($connection) . '</p>';
                        }
                    } else {
                        echo '<p class="error-message">Erro ao mover a música para o diretório de destino.</p>';
                    }
                }
            }

            // Consulta para obter as músicas da tabela Musica
            $query_select_music = "SELECT * FROM musica";
            $result = mysqli_query($connection, $query_select_music);

            if ($result) {
                $musicas_por_usuario = array();

                while ($row = mysqli_fetch_assoc($result)) {
                    $musica_name = $row['musica_name'];

                    // Adiciona a música ao array do usuário correspondente
                    if (!isset($musicas_por_usuario[$musica_name])) {
                        $musicas_por_usuario[$musica_name] = array();
                    }
                    $musicas_por_usuario[$musica_name][] = $row;
                }

                foreach ($musicas_por_usuario as $usuario => $musicas) {
                    echo '<h3>' . $usuario . '</h3>';
                    echo '<ul>';
                    foreach ($musicas as $musica) {
                        echo "<li>";
                        echo "<audio controls>";
                        echo "<source src='" . $musica['musica'] . "' type='audio/mp3'>";
                        echo "Seu navegador não suporta o elemento de áudio.";
                        echo "</audio>";
                        echo "</li>";
                    }
                    echo '</ul>';
                }

                mysqli_free_result($result);
            } else {
                echo '<p class="error-message">Erro ao obter músicas do banco de dados: ' . mysqli_error($connection) . '</p>';
            }
            ?>
        </div>

        <div class="celebrate-phrase">
            Celebrando a Arte, Elevando Vozes...
        </div>
    </div>
</body>
</html>
