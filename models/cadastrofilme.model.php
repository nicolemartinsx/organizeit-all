<?php
// Conexão com o banco de dados MySQL
$host = "127.0.0.1";
$usuario = "root";
$senha = "";
$banco_de_dados = "projeto-web";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $ano = $_POST["ano"];
    $diretor = $_POST["diretor"];
    $sinopse = $_POST["sinopse"];
    $capa = file_get_contents($_FILES["capa"]["tmp_name"]);

    $conn = new mysqli($host, $usuario, $senha, $banco_de_dados);

    // Verifica se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Inserir os dados na tabela de filmes
    $sql = "INSERT INTO filmes (titulo, ano, diretor, sinopse, capa) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Verificar se a preparação da consulta foi bem-sucedida
    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    $stmt->bind_param("sisss", $titulo, $ano, $diretor, $sinopse, $capa);

    if ($stmt->execute()) {
        echo "<script> alert('Filme cadastrado com sucesso!');</script>";
    } else {
        echo "<script> alert('Erro ao cadastrar filme! " . $stmt->error . "');</script>";
    }

    // Fechar a consulta e a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}
