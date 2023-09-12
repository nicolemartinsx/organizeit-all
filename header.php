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
            <img src="imagens/logo.png" alt="Logo da empresa" width="334" height="55">

            <div class="alinhamentoheader">
                <!-- Campo de pesquisa -->
                <form class="pesquisa" method="GET" action="pesquisa.php">
                    <input name="q" type="text" class="pesquisa-input" placeholder="Pesquisar...">
                    <button type="submit"><img src="imagens/pesquisar.png" alt="Lupa" width="25"></button>
                </form>

                <!-- Botões -->
                <a class="headerbutton" href="inicial.php">INICIO</a>
                <a class="headerbutton" href="pesquisa.php">EM ALTA</a>

                <?php
                session_start();

                if (isset($_SESSION["email"])) {
                    // Usuario ja esta logado, redirecionar para a pagina principal 
                ?>
                    <a class="headerbutton" href="watchlist.php">WATCHLIST</a>
                    <div class="dropdown">
                        <button class="dropbtn"><?php echo $_SESSION["nome"]; ?></button>
                        <div class="dropdown-content">
                            <a class="droplink" href="perfil.php">Perfil</a>
                            <a class="droplink" href="logout.php">Sair</a>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <a class="headerbutton login" href="login.php">LOGIN</a>
                <?php } ?>
            </div>
        </div>
    </header>
</body>