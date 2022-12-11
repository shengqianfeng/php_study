<?php

/**
 * @author hello.sheng
 * 1 接口不能被实例化,只能被实现
 * 2 接口中只能定义public abstract方法、public常量，不能有成员变量包括static成员变量
 */
interface Human{
    const NAME = '人';
    //接口中方法默认自带abstract方法
    function eat();

    //public $age;//接口不能有成员变量
    //静态的成员也不能有
    // public static $number = 0;
}

//接口是可以继承的
interface A extends Human{

}

interface B{}
//接口可以多继承
interface C extends A,B{

}


//实现接口
class Man implements Human{
    //重写接口常量也不可以：Cannot inherit previously-inherited or override constant 'NAME' from interface 'Human'
    //const NAME = "男人";
    public function eat()
    {
        // TODO: Implement eat() method.
    }
}

echo Man::NAME;
//abstract类也可以实现接口,不需要实现interface的abstract方法
abstract class Woman implements Human{
}