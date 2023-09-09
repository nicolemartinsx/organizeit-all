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
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastro</h1>

    <!-- Formulario de cadastro -->
    <h2>Inscreva-se</h2>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>