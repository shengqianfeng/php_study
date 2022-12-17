<?php
/**
 * 引入namespace，通过关键字use引入
 */
namespace space1;
class Man{
    public function __construct(){
        echo __METHOD__,"<br>";
    }
    public function display(){
        echo __METHOD__,"<br>";
    }
}
const P=3;
namespace space2;

class Man{}
//new \space1\Man();//这种方式可以，但是太长了,所以引入space1就可以了
//引入space1空间元素，注意引入use默认支持的是类
use  space1\Man as Mman;//取别名，去除冲突

//这种引入常量的方式是不起作用的
//use space1\P;
use const space1\P;


$m = new Mman();
//如果use的时候不加const 则warn提示未定义
echo P,"<br>";

//同样是提示未定义函数
//use space1\display;
//display();
use function space1\display;
$m->display();


namespace space3;
//引入空间：引入space1中的所有内容，表示space1会成为space3的子空间
use space1;
echo "-----<br>";
$mm = new space1\Man();
$mm->display();
