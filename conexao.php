<?php

class Conexao
{
    private static PDO $instancia;

    public static function get()
    {
        try {
            if (!isset(self::$instancia))
                self::$instancia = new PDO("mysql:host=127.0.0.1;dbname=projeto-web", "root", "");
            return self::$instancia;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
