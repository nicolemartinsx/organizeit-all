<?php
//session_start();

//if (isset($_SESSION["email"])) {
    // Usuário ja está logado, redirecionar para pagina principal
//    header("Location: index.php");
//    exit();
//}

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
 //   $nome = $_POST["nome"];
  //  $email = $_POST["email"];
 //  $senha = $_POST["senha"];
 //   $arquivo = '../models/dados/users.txt';

    // Verificar se o email já está cadastrado
 //   $usuarios = file_exists($arquivo) ? file($arquivo, FILE_IGNORE_NEW_LINES) : [];


 //   $sql  = "SELECT id FROM users WHERE email=<?=  $email ";
   // foreach ($usuarios as $linha) {
   //     $dados = explode(",", $linha);
 //       if ($dados[1] == $email) {
 //           echo "<script> alert('Email já cadastrado!');</script>";
//            break;
 //       }
 //   }
//
    // Se o email não estiver cadastrado, adicionar o novo usuário ao arquivo
 //   if (!isset($dados) || $dados[1] != $email) {
 //       $novoUsuario = "$nome,$email,$senha";
  //      file_put_contents($arquivo, $novoUsuario . PHP_EOL, FILE_APPEND);
 //       echo '<script> alert("Cadastro bem sucedido!"); window.location.href= "../controllers/login.controller.php"</script>';
 //   }
//}
