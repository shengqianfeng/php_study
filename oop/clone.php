<?php
//clone：通过已有的对象复制一个新的对象，但两个对象不是同一个对象
class Teacher{
    public $name='default';
    public $age=0;

    public function __clone()
    {
       echo "clone method is called<br>";
    }
}

$s1 = new Teacher();
echo "s1.name:".$s1->name."<br>";
$s2 = clone $s1;//s2新对象被clone出来之后会调用clone方法
var_dump($s1,$s2);
echo "<hr>";
//赋值之后，可以看到两个对象是相互独立的
$s2->name='other';
var_dump($s1,$s2);
