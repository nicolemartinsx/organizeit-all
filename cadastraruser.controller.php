<?php
require_once("../conexao.php");
//require("../models/cadastraruser.model.php");




if (isset($_SESSION["adm"]) && $_SESSION['adm'] == '0') {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $bd = Conexao::get();

    try {
        $query = $bd->prepare("INSERT INTO usuarios (nome, email , senha) VALUES (:nome, :email, :senha)");
        $query->bindParam(':nome', $_POST["nome"]);
        $query->bindParam(':email', $_POST["email"]);
        $query->bindParam(':senha', $_POST["senha"]);
        $query->execute();

        header("Location: ../index.php?sucesso=usuario cadastrado com sucesso!");
    } catch (PDOException $e) {

        header("Location: ?erro=usuario não cadastrado!");
    }
}















require("../views/cadastraruser.view.php");
