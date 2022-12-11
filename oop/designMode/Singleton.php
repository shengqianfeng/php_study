<?php

class Singleton
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    //私有化clone，不允许外部clone
    private function __clone()
    {
    }
}

$s1 = Singleton::getInstance();
$s2 = Singleton::getInstance();
var_dump($s1, $s2);
echo "<hr>";
//$s3 = clone $s2;
//var_dump($s2,$s3);