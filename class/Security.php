<?php
/**
 * Created by PhpStorm.
 * User: apprenant
 * Date: 11/04/18
 * Time: 14:02
 */

abstract class Security
{
    private static $lvl = [
        'easy' => 1,
        'medium' => 2
    ];


    public static function secureVar($var, $level = 0)
    {
        $res = $var;
        if(! in_array($level,self::$lvl))
        {
            $res = htmlentities($res);
        }
        else
        {
            if ($level == 1) {
                $res = strtolower($res);
                $res = str_replace(";","&#59;", $res);
                $res = str_replace("<script>","&lt;script&gt;", $res);
                $res = str_replace("</script>","&lt;&#47;script&gt;", $res);
            }
            if ($level == 2)
            {

                $res = str_replace('\'', '&#39;', $res);
                $res = str_replace('#', '&#35;', $res);
                $res = str_replace('<', '&lt;', $res);
                $res = str_replace('>', '&gt;', $res);
                $res = str_replace('& ', '&amp;', $res);
                //$res = str_replace('|', '&amp;', $res);

            }
        }
        return $res;
    }


    public static function secureFile($file, $level = 0)
    {

    }

// On passe par des variable _Session, donc pas besoin de les protéger finalement.
    public static function secureUser($user)
    {
        return $user->getId();
    }
    public static function returnUser($hash)
    {
        return $hash;
    }
    public static function secureCsrf($level = 0)
    {
        $salt = "nxcwj45/Odsw0177";
        if(! in_array($level,self::$lvl) || 2 == $level)
        {
            $csrf = md5($salt.rand(0,1000));
            return $csrf;
        }
        else
        {
            return $salt;
        }
    }


}