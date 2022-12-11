<?php
/**
 * 命名空间的作用：创建同名的结构，包含函数、常量和类。
 * 不同的namespace对应不同的内存空间
 * 注意：
 * 1 命名空间的第一次声明之前不能有任何代码(异常：Global code should be enclosed in global namespace declaration)
 * 简单说就是，一个文件中的命名空间必须定义在所有代码之前。
 * 一般来说，一个文件中只会定义一个namespace
 *
 * 子空间：在已有的空间之上，再在内部进行划分，让每个小空间独立起来。
 * 命名空间的子空间是直接通过namespace + 路径符号 \ 实现
 * 注意：
 * 1 子空间可以直接创建，不一定需要先创建一级空间，系统会自动创建
 */
//echo "hello，world";//不允许，会提示：Global code should be enclosed in global namespace declaration
//定义一个namespace
namespace my_space;
function display(){
    echo __NAMESPACE__,"<br>";
}

const PI = 3.14;
class Human{

}
//创建一个my_space一级空间的二级子空间
namespace my_space\my_child_space;
//子空间内是可以创建跟一级子空间名字相同的同名结构的
class Human{

}

//class Human{} //不能定义同名的类 除非划分空间,比如下边的方式
namespace space2;
class Human{

}
const PI = 3.14;