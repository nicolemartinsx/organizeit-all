<?php

class Conexao
{
    private static PDO $instancia;

    public static function get()
    {
        try {
            if (!isset(self::$instancia))
                self::$instancia = new PDO("mysql:host=localhost;dbname=projeto-web", "root", "");
            return self::$instancia;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
