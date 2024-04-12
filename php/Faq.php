<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream and Make - FAQ</title>
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

    <!-- Seção de Perguntas Frequentes (FAQ) -->
    <div class="faq-container">
    <div class="faq-container">
    <h1>Perguntas Frequentes (FAQ)</h1>

    <div class="faq-item">
        <div class="faq-question" onclick="toggleAnswer(this)">1. O que é esse projeto?</div>
        <div class="faq-answer">
            Este projeto constitui uma iniciativa privada do Terceiro Ano do Sesi Charuri. É desenvolvido pela equipe TGP e está atualmente em fase de testes.
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question" onclick="toggleAnswer(this)">2. Como faço para adicionar imagens?</div>
        <div class="faq-answer">
        Imagens podem ser enviadas com o autor, mas nao, mas falta varias outras coisas para implementar.
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question" onclick="toggleAnswer(this)">3. Posso personalizar meu perfil?</div>
        <div class="faq-answer">
            Atualmente, encontramo-nos em uma etapa de testes e, por consequência, ainda não é possível realizar essa ação.
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question" onclick="toggleAnswer(this)">4. Como posso publicar conteúdo?</div>
        <div class="faq-answer">
        Imagens podem ser enviadas com o autor, mas nao, mas falta varias outras coisas para implementar.
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question" onclick="toggleAnswer(this)">5. Como denunciar conteúdo inapropriado?</div>
        <div class="faq-answer">
            Contate o administrador.
        </div>
    </div>
    <div class="faq-item">
        <div class="faq-question" onclick="toggleAnswer(this)">5. Como utilizar a plataforma</div>
        <div class="faq-answer">
        <li>      Explorar = comentar nas fotos e conhecer novos autores e tipo de autores</li>
            <li> Galeria = Todas as fotos</li>
            <li>  Musicas = Sao todas as Musicas</li>
            <li> Envie sua arte = o nome ja diz</li>
            <li> Faq = Perguuntas e Respostas</li>
            <li>  Ajuda = nome ja diz</li>
            <li> Core Values = fotos do tir e fotos de nossos amigos</li>
            <li>Sobre = tudo sobre a equipe</li>
        </div>
</div>
    <script>
        function toggleAnswer(element) {
            var answer = element.nextElementSibling;
            if (answer.style.display === "block") {
                answer.style.display = "none";
            } else {
                answer.style.display = "block";
            }
        }
    </script>
        <div class="celebrate-phrase">
        Celebrando a Arte, Elevando Vozes...
    </div>    
</body>
</html>
