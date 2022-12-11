<?php

class Women
{
    public function display()
    {
        echo "I am women";
    }
}

class Man
{
    public function display()
    {
        echo "I am man";
    }
}

class HumanFactory
{
    //普通工厂方法：专门生产对象
    /*  public function getInstance($classname){
          return new $classname();
      }*/
    //静态工厂方法：缺点是必须知道类名
   /* public static function getInstance($classname)
    {
        return new $classname();
    }*/

    public static function getInstance($flag){
        switch ($flag){
            case 'a':
                return new Man();
            case 'b':
                return new Women();
            default:
                return null;
        }
    }
}

//$factory = new HumanFactory();
//$man = $factory->getInstance('Man');
//$man->display();

//$women = HumanFactory::getInstance('Women');
//$women->display();

$human = HumanFactory::getInstance('a');
$human->display();

//报错
$human = HumanFactory::getInstance('c');
$human->display();