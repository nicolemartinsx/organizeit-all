<?php
class reviews
{
    private $id;
    private $titulo;
    private $ano;
    private $diretor;
    private $sinopse;
    private $estrelas;
    private $capa;
    private $idUsuarios;
    private $idFilmes;
    private $avaliacao;
    private $genero;
    private $comentario;
    private $nome;

    public function __get($propriedade)
    {
        return $this->$propriedade;
    }

    public function __set($propriedade, $valor)
    {
        return $this->$propriedade = $valor;
    }
}
