<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 11/04/18
 * Time: 10:27
 */

class Database
{
    public function __construct()
    {
        $user = 'root';
        $pass = 'admin';
        $database = 'hack';

        return new PDO('mysql:host=localhost;dbname='.$database, $user, $pass);
    }

}