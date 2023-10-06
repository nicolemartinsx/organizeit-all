
<?php
session_start();

if (isset($_SESSION["email"])) {
    // Usuario ja esta logado, redirecionar para a pagina principal
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Verificar os dados do usuário no arquivo "models/dados/users.txt"
    $usuarios = file("../models/dados/users.txt", FILE_IGNORE_NEW_LINES);
    foreach ($usuarios as $linha) {
        $dados = explode(",", $linha);
        if ($dados[1] == $email && $dados[2] == $senha) {
            $_SESSION["email"] = $email;
            $_SESSION["nome"] = $dados[0];
            $_SESSION['adm'] = $dados[3];
            header("Location: ../index.php");
        }
    }

    // Se não for encontrado um usuario correspondente, exibe uma mensagem de erro
    echo "<script> alert('Email ou senha incorretos!');</script>";
}
?>
