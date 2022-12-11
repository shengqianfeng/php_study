<?php
/**
 * self关键字存在一个问题：
 *      当子类对象在访问父类方法时，如果父类方法内部使用到self关键字，那self到底代表谁呢？
 * 静态延迟绑定：
 *      ①self是一种静态绑定，也就是当类在编译的时候self已经明确绑定了类名，因此不论多少继承，也不管子类还是父类来访问
 * self都代表的是当前类。如果想要选择性来支持来访者的身份，就需要用到所谓静态延迟绑定。
 *      ②在类内部用来代表类本身的关键字部分不是类编译时固定确定的，而是当方法被访问时动态的选择来访者身份。静态延迟绑定就是利用
 * static关键字代替静态绑定的self关键字，静态延迟绑定需要静态成员的重写。
 *
 */

class Human
{
    public static $name = "Human";

    public static function showName()
    {
        //静态绑定
        echo self::$name, "<br>";
        //静态延迟绑定
        echo static::$name, "：static lazy binder ：<br>";
    }
}

class Man extends Human {
    //重写父类的静态属性
    public static $name = 'Man';

}
Man::showName();
echo "<hr>";
//只有子类来访问，静态延迟绑定才有效果
Human::showName();