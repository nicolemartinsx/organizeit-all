<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../public/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">

        <img class="logologin" src="../public/imagens/logologin.png">
        <div class="campos">
            <h1>iniciar sessão</h1>

            <!-- Formulario de login -->
            <form method="post" action="">
                <input type="email" name="email" placeholder="Email" required>

                <div class="botaologin">
                    <input type="password" name="senha" placeholder="Senha" required>

                    <button type="submit"><img src="../public/imagens/entrarbutton.png"></button>
                </div>
            </form>

            <!-- Botão para redirecionar para a pagina de cadastro -->
            <a href="cadastro">cadastre-se</a>
        </div>
    </div>
</body>

</html>