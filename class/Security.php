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

    private static $avatar = [
        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
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
            elseif ($level == 2)
            {
                $res = strtolower($res);
                $res = str_replace(";","&#59;", $res);
                $first = strpos( $res, "<");

                if($first >= 0) {
                    $res = substr_replace($res, "&lt;", $first, 1);
                }
                $first = strpos($res,">");
                if($first >= 0)
                {
                    $res = substr_replace ($res,"&gt;", $first,1);
                }


                $second = strpos($res,"<");
                var_dump($second);
                if($second >=0)
                {
                    $res = substr_replace ($res,"&lt;", $second,1);
                }
                $second = strpos($res,">");
                if($second >= 0)
                {
                    $res = substr_replace ($res,"&gt;", $second,1);
                }


                $res = str_replace('"', '&quot;;', $res);
                $res = str_replace('#', '&#35;', $res);

                $res = str_replace('& ', '&amp;', $res);
                $res = str_replace('/', '&#47;', $res);
                $res = str_replace('|', ' &#124;', $res);

            }
        }
        return $res;
    }


    public static function secureFile($img, $level = 0)
    {


        if(! in_array($level,self::$lvl))
        {
            /**
             * @TODO : trouver une lib qui ouvre l'image en question et test la palette associée.
             */
        }
        else
        {
            if($level == 1)

            if ($level == 2) {
                $ext = mime_content_type($img);
                if(! in_array($ext, self::$avatar))
                {
                    return false;
                }
                else
                {
                    return true;
                }
            }
        }
    }
}