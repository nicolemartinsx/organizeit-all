<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organize IT.all</title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="/public/imagens/favicon.ico">
</head>

<body>
    <header>
        <div class="header-container">
            <!-- Logo -->
            <img src="/public/imagens/logo.png" alt="Logo da empresa" width="334" height="55">

            <div class="alinhamentoheader">
                <!-- Campo de pesquisa -->
                <form class="pesquisa" method="GET" action="/pesquisa">
                    <input name="q" type="text" class="pesquisa-input" placeholder="Pesquisar...">
                    <button type="submit"><img src="/public/imagens/pesquisar.png" alt="Lupa" width="25"></button>
                </form>

                <!-- Botões -->
                <a class="headerbutton" href="/">INICIO</a>
                <a class="headerbutton" href="/em-alta">EM ALTA</a>

                <?php
                if (isset($_SESSION["id"]) == false) {
                    session_start();
                }
                if (isset($_SESSION["adm"]) && $_SESSION['adm'] == '1') {
                ?>
                    <a class="headerbutton" href="/filme/cadastrar">CADASTRAR</a>
                <?php
                }

                if (isset($_SESSION["id"])) {
                    // Usuario ja esta logado, redirecionar para a pagina principal 
                ?>
                    <a class="headerbutton" href="/watchlist">WATCHLIST</a>
                    <div class="dropdown">
                        <button class="dropbtn"><?php echo $_SESSION["nome"]; ?></button>
                        <div class="dropdown-content">
                            <a class="droplink" href="/perfil/<?= $_SESSION['id'] ?>">Perfil</a>
                            <a class="droplink" href="/logout">Sair</a>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <a class="headerbutton login" href="login">LOGIN</a>
                <?php } ?>
            </div>
        </div>
    </header>
</body>