<?php
/**
 * @author hello.sheng
 * 1 trait内部可以拥有一个成员属性(包含static)，成员方法(包含static)，但不能有类常量
 * 2 trait是用来复用代码的，不能被实例化，也不能被继承，所以你定义protected控制没有意义
 * 3 trait是用来将公共代码提供给其他类使用的，而类要使用trait的前提是要加载对应trait
 */

//定义一个Trait，trait关键字类似class
trait Eat
{
    //ERROR!!! Traits cannot have constants
    //const NAME = "eat":
    public $time;//可以定义，但实际不用
    public $name="eat is my name";
    public function showTime()
    {
        echo "Eat::showTime();<br>";
        echo $this->time;

    }

}

//错误！！！不能实例化trait
//new Eat();

trait Sleep
{
    public function showTime()
    {
        echo "Sleep::showTime();<br>";
    }
}

class Human
{

    public function showTime(){
        echo "human::showTime();<br>";
    }
}

class Man extends Human
{
    /**
     * 类中不允许出现与引入trait中同名称的属性，比如name在trait中已经存在，产生冲突
     */
    //public $name = "男人";
    /**
     * use的含义：将trait Eta中定义的所有东西拿到了当前类Man中
     *
     */
    use Eat, Sleep {
        //当出现多个trait出现同名方法导致冲突时，需要insteadof选择其中一个。而另一个要想也能使用到，需要重命名
        Eat::showTime insteadof Sleep;
        Sleep::showTime as sleepShowTime;
    }


    //会会改trait中定义的showTime方法，优先级最高
//    public function showTime()
//    {
//        echo "man::showTime();<br>";
//    }
}

$m = new Man();
/**
 * 同名方法的优先级关系：
 * 输出：Eat::showTime();
 * 但如果Man类中定义了showTime则输出:man::showTime();产生覆盖.
 * 但如果仅仅是Human父类中定义了showTime方法，则输出Eat::showTime();
 * 优先级说明：
 *    当前类   > trait > 父类
 *
 */
$m->showTime();
//输出：Sleep::showTime();
$m->sleepShowTime();

