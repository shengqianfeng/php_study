<?php
class Saler{
    public static $SUCCESS = "success";
    const PI = 3.14;
    public $address;
    public $remark;

    public static function showSuccess(){
//        var_dump($this); 不要把this放在静态方法内部
        echo self::$SUCCESS;
    }
}
//演示对象传值 引用传递
$s1 = new Saler();
$s2 = $s1;
//两个对象其实是同一个对象
var_dump($s1,$s2);
echo "<hr>";


$s1->address = 'henan';
$s2->remark = "zhengzhou";
var_dump($s1,$s2);


echo "<hr>";
//演示如何访问类常量 :: 范围解析操作符
echo Saler::PI;


echo "<hr>";
//演示如何访问静态属性
echo Saler::$SUCCESS;

//不能使用对象访问静态属性
//$s2->SUCCESS;


echo "<hr>";
//演示如何访问静态方法
Saler::showSuccess();
//也可以通过对象访问静态方法，但是不推荐使用
//$s2->showSuccess();