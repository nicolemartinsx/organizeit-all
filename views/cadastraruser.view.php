<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="../public/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="cadastro">
    <div>
        <img class="logo" src="../public/imagens/logo.png">

        <!-- Formulario de cadastro -->
        <div class="container">

            <form method="post" action="">
                <h1>cadastro</h1>
                <input type="text" name="nome" placeholder="Nome" required>

                <input type="email" name="email" placeholder="Email" required>

                <input type="password" name="senha" placeholder="Senha" required>

                <button class="cadastrar">criar conta</button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_GET['mensagem'])) {
        echo "<script> alert('" . $_GET['mensagem'] . "');</script>";
    }
    ?>
</body>

</html>