<?php
$base_url = "http://projeto-web.test";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organize IT.all</title>
    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>/public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="<?= $base_url ?>/public/imagens/favicon.ico" type="image/x-icon">
</head>

<body>
    <header>
        <div class="header-container">
            <!-- Logo -->
            <img src="<?= $base_url ?>/public/imagens/logo.png" alt="Logo da empresa" width="334" height="55">

            <div class="alinhamentoheader">
                <!-- Campo de pesquisa -->
                <form class="pesquisa" method="GET" action="<?= $base_url ?>/controllers/pesquisa.controller.php">
                    <input name="q" type="text" class="pesquisa-input" placeholder="Pesquisar...">
                    <button type="submit"><img src="<?= $base_url ?>/public/imagens/pesquisar.png" alt="Lupa" width="25"></button>
                </form>

                <!-- Botões -->
                <a class="headerbutton" href="<?= $base_url ?>/index.php">INICIO</a>
                <a class="headerbutton" href="<?= $base_url ?>/controllers/pesquisa.controller.php">EM ALTA</a>

                <?php
                session_start();
                if (isset($_SESSION["adm"]) && $_SESSION['adm'] == '1') {
                ?>
                    <a class="headerbutton" href="<?= $base_url ?>/controllers/cadastrarfilme.controller.php">CADASTRAR</a>
                <?php
                }

                if (isset($_SESSION["email"])) {
                    // Usuario ja esta logado, redirecionar para a pagina principal 
                ?>
                    <a class="headerbutton" href="<?= $base_url ?>/controllers/watchlist.controller.php">WATCHLIST</a>
                    <div class="dropdown">
                        <button class="dropbtn"><?php echo $_SESSION["nome"]; ?></button>
                        <div class="dropdown-content">
                            <a class="droplink" href="<?= $base_url ?>/controllers/perfil.controller.php">Perfil</a>
                            <a class="droplink" href="<?= $base_url ?>/controllers/logout.controller.php">Sair</a>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <a class="headerbutton login" href="<?= $base_url ?>/controllers/login.controller.php">LOGIN</a>
                <?php } ?>
            </div>
        </div>
    </header>
</body>