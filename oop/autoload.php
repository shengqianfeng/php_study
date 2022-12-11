<?php
//__autoload是系统提供的自动加载的函数
function __autoload($className){
    echo "auto load:".$className;
    $file =  "entity/".$className.'.php';
    if(file_exists($file)){
        include_once $file;
    }
    echo "<hr>";
}
echo "<hr>";
$s = new Student();
echo "the name is:".$s->name;
echo "<hr>";
//类的加载和方法加载
class AutoLoad{
    public static function load($className){
        $file =  "entity/".$className.'.php';
        if(file_exists($file)){
            require_once $file;
        }
        echo "<hr>";
    }
}

spl_autoload_register(array('AutoLoad','load'));
