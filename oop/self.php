<?php
//演示self关键字，self关键字是一种在类内部访问代替类名的写法
class Saler{
    private static $count = 0;
    private $area = "金水区";

    public static function getInstance(){
        return new self();//代替类名来构造
    }
    public static function show(){
        echo Saler::$count;
        echo "<hr>";
        echo self::$count;//代替类名
    }
    public function getArea(){
        return $this->area;
    }
}
Saler::show();
echo "<hr>";
echo  Saler::getInstance()->getArea();
echo "<hr>";
$s = Saler::getInstance();
var_dump($s);
echo "<hr>";
//输出 金水区
echo $s->getArea();
