<?php
session_start();

if (isset($_SESSION["email"])) {
    // Usuário já está logado, redirecionar para a página principal
    header("Location: principal.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Verificar os dados do usuário no arquivo "usuarios.txt"
    $usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES);
    foreach ($usuarios as $linha) {
        $dados = explode(",", $linha);
        if ($dados[1] == $email && $dados[2] == $senha) {
            $_SESSION["email"] = $email;
            $_SESSION["nome"] = $dados[0];
            echo "<p>Login bem-sucedido como $email. Redirecionando para a página principal...</p>";
            echo "<meta http-equiv='refresh' content='2;url=principal.php'>"; // Redireciona após 2 segundos
            break;
        }
    }

    // Se não for encontrado um usuário correspondente, exibe uma mensagem de erro
    echo "<p>Email ou senha incorretos.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <!-- Formulário de login -->
    <h2>Faça login</h2>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>
