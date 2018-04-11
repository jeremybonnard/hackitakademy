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

        try{
            $pdo = new PDO('mysql:dbname='.$database.';host=127.0.0.1', $user, $pass);
        }
        catch(PDOException $Exception){
            die( $Exception->getMessage());
        }
        return $pdo;

    }

    public static function getConnection()
    {
        if(!(self::$const))
        {
            self::$const = self::makeConnection();
        }
        return self::$const;
    }



}