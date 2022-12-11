<?php
//普通类可以被继承
class Man{
    public final function sex(){

    }
}
class Boy extends Man{}

//定义类，不希望被继承
final class Girl{

}
//编译异常：Class may not inherit from final class
//class LittleGirl extends Girl{
//
//}

//final除了可以修饰类，也可以修饰方法让方法不能被继承
class BigMan extends Man{
    //编译错误：Cannot override final method Man->sex()
//    public function sex(){
//
//    }
}