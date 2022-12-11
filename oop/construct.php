<?php

class Saler
{
    private $name;
    private $age;

 /*   public function __construct()
    {
        echo __CLASS__;
        $this->name = 'jeff';
        $this->age = 20;
    }*/

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * 析构方法：在对象被销毁的时候会自动调用
     */
    function __destruct(){
        echo "<br>I am the function:".__FUNCTION__;
    }
}

var_dump(new Saler('jeff',21));
