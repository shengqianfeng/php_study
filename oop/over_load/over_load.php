<?php

/**
 * php重载“
 * 1 php重载不是指同名方法，而是指对象或类在访问一些不允许或者不存在的属性或者方法的时候，自动调用的魔术方法
 * 2 php重载分为属性重载和方法重载
 * 3 php重载的目的是为了保护程序的正确运行而提供的一种容错机制
 * 4 并非所有类都需要实现这些重载，只是如果有类需要对外提供访问使用的时候才有必要采取
 */
 class User{
     private $age = 10;
     public function __get($name){
         echo __METHOD__." is called, the property is:".$name,"<br>";
     }

     public function __set($name,$value){
         echo __METHOD__." is called, the property is ",$name." and the new value is ".$value,"<br>";
     }

     public function __isset($name)
     {
         echo __METHOD__," is called, the property is ",$name," and the result is ",isset($this->$name),"<br>";
     }

     public function __unset($name)
     {
         echo __METHOD__." is called, the property is ",$name,"<br>";
     }

     public function __toString()
     {
         echo __METHOD__." is called, <br>";
         return "return a string ";
     }

 }

$user = new User();
 //可以看到：即使属性是私有的也照样可以在这些重载方法被调用时输出
 //User::__get is called, property is:age
 $user->age;
 //User::__set is called, the property is age and the new value is 100
$user->age = 100;
//User::__isset is called, the property is age and the result is 1
isset($user->age);
//User::__isset is called, the property is name and the result is  什么都没有
isset($user->name);
var_dump($user);
//User::__unset is called, the property is age
unset($user->age);
//User::__toString
echo $user;

echo "<hr>";

class Man{
    public $name;
    public $age;
    public $address;
    public $sex;
    private $remark;
    private function display(){
        echo __METHOD__;
    }
    private static function show(){
        echo __METHOD__;
    }
    public function __call($function_name,$args){
        echo __METHOD__," is called, the function name is ",$function_name,"<br>";
    }
    public static function __callStatic($function_name,$args){
        echo __METHOD__," is called, the function name is ",$function_name,"<br>";
    }
}

$m = new Man();
//Man::__call is called, the function name is display
//通过这种方式就可以访问私有方法而不会报错，不过display方法并不会执行到
$m->display();
//Man::__callStatic is called, the function name is show
//私有的静态方法通过这种方式照样可以访问，只不过show方法不会执行
Man::show();
echo "<hr>";
//遍历对象中的共有属性，如果想遍历出private属性，可以在类内部遍历
/**
 * 输出：
name:
age:
address:
sex:
 */
foreach ($m as $k => $v){
    echo $k,':',$v."<br>";
}
