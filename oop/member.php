<?php

class Buyer
{
    public $name;
    public $money = 0;
}
//实例化
$buyer = new Buyer();
var_dump($buyer);
//访问属性
echo $buyer->money;

//修改属性
$buyer->name = "jeff";
echo $buyer->name;

//新增属性
$buyer->age = 30;
$buyer->gender = 'man';
var_dump($buyer);


echo "<hr>";
//实例化新类 仍然只有两个成员属性
$buyer2 = new Buyer();
var_dump($buyer2);

echo "<hr>";
//删除属性
unset($buyer2->name);
var_dump($buyer2);

echo "<hr>";
class Saler{
    //类常量不能被对象直接访问
    const PI = 3.14;
    //成员方法 输出类名
    public function display(){
        echo __CLASS__;
    }
}

$saler = new Saler();
$saler->display();
