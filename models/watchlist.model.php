<?php

class Watchlist
{
    private $id;
    private $titulo;
    private $diretor;
    private $estrelas;
    private $genero;
    private $ano;
    private $capa;
    private $idUsuarios;
    private $idFilmes;
    private $sinopse;

    public function __get($propriedade)
    {
        return $this->$propriedade;
    }

    public function __set($propriedade, $valor)
    {
        return $this->$propriedade = $valor;
    }
}
