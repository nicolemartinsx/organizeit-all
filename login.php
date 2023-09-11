<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">

        <img class="logologin" src="imagens/logologin.png">
        <div class="campos">
            <h1>iniciar sessão</h1>

            <!-- Formulario de login -->
            <form method="post" action="">
                <input type="email" name="email" placeholder="Email" required>

                <div class="botaologin">
                    <input type="password" name="senha" placeholder="Senha" required>

                    <button type="submit"><img src="imagens/entrarbutton.png"></button>
                </div>
                <?php
                session_start();

                if (isset($_SESSION["email"])) {
                    // Usuario ja esta logado, redirecionar para a pagina principal
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

                    // Se não for encontrado um usuario correspondente, exibe uma mensagem de erro
                    echo "<p>email ou senha incorretos!</p>";
                }
                ?>
            </form>

            <!-- Botão para redirecionar para a pagina de cadastro -->
            <a href="cadastro.php">cadastre-se</a>
        </div>
    </div>
</body>

</html>