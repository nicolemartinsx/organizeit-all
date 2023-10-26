<?php

require_once("conexao.php");
require("models/filme.model.php");

class CadastrarFilmeController {
    public function index() {
        if (isset($_SESSION["adm"]) && $_SESSION['adm'] == '0') {
            header("Location: /");
            exit();
        }

        require('views/cadastrarfilme.view.php');
    }

    public function cadastrar() {
        $capa = file_get_contents($_FILES["capa"]["tmp_name"]);
        
        $bd = Conexao::get();
    
        try {
            $query = $bd->prepare("INSERT INTO filmes (titulo, ano, diretor, sinopse, genero, estrelas, capa) VALUES (:titulo, :ano, :diretor, :sinopse, :genero, :estrelas, :capa)");
            $query->bindParam(':titulo', $_POST["titulo"]);
            $query->bindParam(':ano', $_POST["ano"]);
            $query->bindParam(':diretor', $_POST["diretor"]);
            $query->bindParam(':sinopse', $_POST["sinopse"]);
            $query->bindParam(':genero', $_POST["genero"]);
            $query->bindParam(':estrelas', $_POST["estrelas"]);
            $query->bindParam(':capa', $capa);
            $query->execute();
    
            header("Location: /?mensagem=Filme cadastrado com sucesso!");
        } catch (PDOException $e) {
            header("Location: ?mensagem=Filme não cadastrado!");
        }
    }
}
