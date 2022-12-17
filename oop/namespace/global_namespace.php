<?php
/**
 * 全局空间，空间元素在没有定义空间的情况下所属的空间，也就是所有空间的顶级空间。
 * 系统内置的函数、常量和类都属于全局空间
 *
 * 注意：文件的包含include和空间的包含是没有关系的，二者是独立的。文件是在加载文件时，空间时在进入内存后。
 */

/*//创建函数，属于全局空间
function mdisplay(){
    echo __NAMESPACE__,__FUNCTION__,"<br>";
}
//全局空间没有自己的名字，所以不会输出内容
mdisplay();
//完全限定名称访问，格式：全局符号“\”+全局空间元素
\mdisplay();*/


//定义空间
namespace space;
/*function display(){
    echo __NAMESPACE__,"<br>";
}*/
//const PHP_VERSION = 7;

//访问空间常量元素，先找自己空间，如果当前空间没有，继续在全局空间中找
echo PHP_VERSION,"<br>";

//函数访问  输出3
echo count(array(1,2,4));

//重点掌握
//访问系统类 直接在当前namespace找，找不到就报错，注意类是一定要在当前namespace中找的，也就是前边必须加\
new \mysqli('localhost','root','123456','test',3306);

include_once "nospace.php";
//输出space，也就是优先访问自己空间的函数,找不到才找全局空间的函数
display();//建议使用完全限定名称访问，直接就在全局空间找