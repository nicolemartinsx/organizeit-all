<?php

class LoginController
{


   function Login()
   {
      require("views/login.view.php");
   }


   function RealizarLogin()
   {
      session_start();

      $bd = Conexao::get();
      $query = $bd->prepare("SELECT * FROM usuarios WHERE email = :email and senha = :senha");
      $query->bindParam(':email', $_POST['email']);
      $query->bindParam(':senha', $_POST['senha']);
      $query->execute();

      $result = $query->fetch();

      if ($result) {

         $_SESSION["email"] = $_POST['email'];
         $_SESSION["nome"] = $result['nome'];
         $_SESSION['adm'] = 1;
         $_SESSION['id'] = $result['id'];
         echo 'query foi um sucesso';
         header("Location: /");
      } else {
         echo 'não funcionou';
      }
   }
}
