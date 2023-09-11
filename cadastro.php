<?php
session_start();

if (isset($_SESSION["email"])) {
    // Usuário ja está logado, redirecionar para pagina principal
    header("Location: principal.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Verificar se o email já está cadastrado
    $usuarios = file_exists("usuarios.txt") ? file("usuarios.txt", FILE_IGNORE_NEW_LINES) : [];

    foreach ($usuarios as $linha) {
        $dados = explode(",", $linha);
        if ($dados[1] == $email) {
            echo "<p>Email já cadastrado. Escolha outro email.</p>";
            break;
        }
    }

    // Se o email não estiver cadastrado, adicionar o novo usuário ao arquivo
    if (!isset($dados) || $dados[1] != $email) {
        $novoUsuario = "$nome,$email,$senha";
        file_put_contents("usuarios.txt", $novoUsuario . PHP_EOL, FILE_APPEND);
        echo "<p>Cadastro bem-sucedido como $email. <a href='login.php'>Faça login</a></p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="cadastro">
    <div>
        <img class="logo" src="imagens/logo.png">

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
</body>

</html>