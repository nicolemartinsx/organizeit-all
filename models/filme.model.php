<?php

class Filme
{
    private $titulo;
    private $diretor;
    private $estrelas;
    private $genero;
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
