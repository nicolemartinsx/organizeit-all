<?php

class LoginController
{


   function Login()
   {
      require("views/login.view.php");
   }


   function RealizarLogin(){
    
      
    
         session_start(); 
     
         $bd = Conexao::get();
         $query = $bd->prepare("SELECT * FROM usuarios WHERE email = :email and senha = :senha");
         $query->bindParam(':email', $_POST['email']);
         $query->bindParam(':senha', $_POST['senha']);
         $query->execute();
         
         $result = $query->fetch();
         
         if($result){
         
            $_SESSION["email"] = $_POST['email'];
            $_SESSION["nome"] = $result['nome'];
            $_SESSION['adm'] = $result['adm'];
            $_SESSION['id'] = $result['id'];
            
            header("Location: /");
         }else{
            header("Location: /login?mensagem=Email ou senha incorretos");
         }
         
         
        
   }
}
