<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organize IT.all</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="header-container">
            <!-- Logo -->
            <img src="logo.png" alt="Logo da empresa" width="334" height="55">

            <div class="alinhamentoheader">
                <!-- Campo de pesquisa -->
                <div class="pesquisa">
                    <input type="text" class="pesquisa-input" placeholder="Pesquisar...">
                    <a><img src="pesquisar.png" alt="Lupa" width="25"></a>
                </div>

                <!-- Botões -->


                <a class="headerbutton" href="index.php">INICIO</a>
                <a class="headerbutton" href="emalta.php">EM ALTA</a>
                <a class="headerbutton login" href="login.php">LOGIN</a>
            </div>
        </div>
    </header>
    <main>
        </br>
        <div class="welcome">JUNTE-SE A NOSSA COMUNIDADE!</div>

        <!-- Em alta -->
        <div class="divisao">
            em alta
            <hr>
        </div>


        <div class="filmes">
            <img src="1.jpg" class="capa" alt="Filme 1">
            <img src="2.jpg" class="capa" alt="Filme 2">
            <img src="3.jpg" class="capa" alt="Filme 3">
            <img src="4.jpg" class="capa" alt="Filme 4">
            <img src="5.jpg" class="capa" alt="Filme 5">
            <img src="6.jpg" class="capa" alt="Filme 6">
        </div>

        <div class="bvermais">
            <a href="emalta.php">ver mais</a>
        </div>

        <!-- Reviews -->
        <div class=" divisao">
            novas reviews
            <hr>
        </div>

        <div class="tabelareviews">
            <div class="review">
                <img src="1.jpg" class="capa" alt="Filme 1">
                <div class="info">
                    <div class="autor"> <img src="imagens/usuario.png" class="icone" />
                        Autor da Review
                    </div>
                    <div class="titulo">Blue Beetle 2023</div>
                    <div class="estrela">
                        <img src="estrela.png" />
                        <img src="estrela.png" />
                        <img src="estrela.png" />
                        <img src="estrela.png" />
                        <img src="estrela_outline.png">
                    </div>

                    <div class="texto"><img src="quote.png" class="icone" />
                        texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                    </div>
                </div>
            </div>
            <!-- Outra review -->
            <div class="review">
                <img src="2.jpg" class="capa" alt="Filme 2">
                <div class="info">
                    <div class="autor"> <img src="imagens/usuario.png" class="icone" />
                        Autor da Review
                    </div>
                    <div class="titulo">Indiana Jones 2023</div>
                    <div class="estrela">
                        <img src="estrela.png" />
                        <img src="estrela.png" />
                        <img src="estrela.png" />
                        <img src="estrela.png" />
                        <img src="estrela_outline.png">
                    </div>

                    <div class="texto">
                        <img src="quote.png" class="icone" />
                        texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                    </div>
                </div>
            </div>

            <!-- Outra review -->
            <div class="review">
                <img src="3.jpg" class="capa" alt="Filme 3">
                <div class="info">
                    <div class="autor"> <img src="imagens/usuario.png" class="icone" />
                        Autor da Review
                    </div>
                    <div class="titulo">Oppenheimer 2023</div>
                    <div class="estrela">
                        <img src="estrela.png" />
                        <img src="estrela.png" />
                        <img src="estrela.png" />
                        <img src="estrela_outline.png" />
                        <img src="estrela_outline.png">
                    </div>

                    <div class="texto">
                        <img src="quote.png" class="icone" />
                        texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto
                    </div>
                </div>
            </div>
        </div>


    </main>
    <!-- Footer -->
    <footer>
        <div>
            <a>Sobre nós </a>
            <a>Contato </a>
            <a>Termos de uso</a>
        </div>
        <span>Criado por Celson, Matheus e Nicole <br> 2023</span>
    </footer>
</body>

</html>