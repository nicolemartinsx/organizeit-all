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
                <a class="headerbutton" href="emalta.php">EM ALTA</a>
                <a class="headerbutton login" href="login.php">LOGIN</a>
            </div>
        </div>
    </header>
</body>