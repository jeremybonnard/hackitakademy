<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 11/04/18
 * Time: 10:27
 */

abstract class Database
{
    private static $const;

    private static function makeConnection()
    {
        $user = 'root';
        $pass = 'admin';
        $database = 'hack';

        return new PDO('mysql:host=localhost;dbname='.$database, $user, $pass);
    }

    public static function getConnection()
    {
        if(!(self::$const))
        {
            self::$const = self::makeConnection();
        }
        return self::$const;
    }


    public static function secureVar($var)
    {
        str_replace('\'','', $var);
        str_replace('#','', $var);
        str_replace('<','', $var);
        str_replace('>','', $var);

        return $var;
    }
}