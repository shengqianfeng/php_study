<?php

class Nothing{

}

class MyClass{

}

var_dump(new Nothing());

$n = new Nothing();
$m = new MyClass();
var_dump($n);
var_dump($m);
