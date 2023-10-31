<?php

require("models/cadastraruser.model.php");



class CadastraruserController
{
    function Cadastraruser()
    {
        session_start();

        // if (isset($_SESSION["email"])) {
        //     // Usuário ja está logado, redirecionar para pagina principal
        //     header("Location: /");
        //     exit();
        // }

        require("views/cadastraruser.view.php");
    }

    function RealizarCadastro()
    {

        session_start();

        $bd = Conexao::get();
        $query = $bd->prepare("INSERT INTO usuarios (email, senha , nome) VALUES (:email, :senha, :nome)");
        $query->bindParam(':email', $_POST['email']);
        $query->bindParam(':senha', $_POST['senha']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->execute();

        $result = $query->fetch();

        if ($result) {
            echo 'não funcionou';
            header("Location: /");
        } else {

            header("Location: /");
        }
    }
}
