<?php

//访问修饰限定符
class Person{
    const PI = 3.14;
    //public公有修饰符，类内部和外部都可以访问
    public $name;
    protected $money = 100;
    private $age = 20;

    public function getAge(){
        return $this->age;
    }

    public static function add($a,$b){
        return $a+$b;
    }
}

$b = new Person();
$b->name = "tom";
echo $b->name."<br>";
//不能在类的外面访问受保护protect的成员
//$b->money;
//也不能在类的外面访问私有private的成员  但可以通过get方法
//$b-age;
echo $b->getAge()."<br>";
//调用静态方法
echo Person::add(1,2);



