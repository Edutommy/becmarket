<?php

namespace modelo;

class Conexion
{
    
    public static $user = "updxeijqwbstiean";
    public static $pass = "898ejHOD9orCsQ04ISpy";
    public static $URL = "mysql:host=bx1jwcse9zu5ruflhfj8-mysql.services.clever-cloud.com;dbname=bx1jwcse9zu5ruflhfj8";

    public static function conector()
    {
        try {
            return new \PDO(Conexion::$URL, Conexion::$user, Conexion::$pass);
        } catch (\PDOException $e) {
            return null;
        }
    }
}
