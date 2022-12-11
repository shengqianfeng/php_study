<?php
abstract class Human{

}
//Cannot instantiate abstract class 'Human'
//$h = new Human();

//抽象类不能实例化，只能被继承
class Man extends Human {
    /**
     * Class Man contains 1 abstract method
     * and must therefore be declared abstract or implement the remaining methods
     * @return mixed
     */
//    public abstract function doSomething();
}

/**
 * 含有抽象方法的类必须是抽象类,而且abstract方法不能是private方法，因为要被用于实现
 * */
abstract class Animal{
    abstract public function eat();
}
abstract class Dog extends Animal{

}

/**
 * 抽象类的抽象方法必须被实现
 */
class Cat extends Animal{

    public function eat()
    {
        // TODO: Implement eat() method.
    }
}