<?php
require_once("../conexao.php");
require("../models/login.model.php");
session_start();





if ($_SERVER["REQUEST_METHOD"] == "POST") {


$bd = Conexao::get();

$query = $bd->prepare("SELECT * FROM usuarios WHERE email = :email and senha = :senha");
$query->bindParam(':email', $_POST['email']);
$query->bindParam(':senha', $_POST['senha']);
$query->execute();

$result = $query->fetch();

if($result){

   $_SESSION["email"] = "celson.bac@gmail.com";
   $_SESSION["nome"] = $result['nome'];
   $_SESSION['adm'] = 1;
   echo'query foi um sucesso';
   header("Location: ../index.php");
}else{
   echo 'não funcionou';
}


}
require("../views/login.view.php");
