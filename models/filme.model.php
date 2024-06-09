<?php

class Filme
{
    private $id;
    private $titulo;
    private $diretor;
    private $estrelas;
    private $genero;
    private $sinopse;
    private $ano;
    private $capa;

    public function __get($propriedade)
    {
        return $this->$propriedade;
    }

    public function __set($propriedade, $valor)
    {
        return $this->$propriedade = $valor;
    }
}
