<?php 
class reviews
{
    private $idUsuarios;
    private $idFIlmes;
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

