<?php
//echo "hello world";

//phpinfo();
echo "<br>============简单Mysql查询演示=================<br>";
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "test";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$sql = "SELECT * FROM t_dict";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出数据
    while ($row = $result->fetch_assoc()) {
        echo "DictId: " . $row["dict_id"] . " - ustatus: " . $row["ustatus"] . " - uvalue: " . $row["uvalue"] . "<br>";
    }
} else {
    echo "0 结果";
}
$conn->close();


echo "==============可变变量演示===============<br>";
$a = 'b';
$b = 'bbb';
echo "\$\$a=" . $$a;

echo "<br>===========未赋值变量会报错：Undefined variable==================<br>";
$x;
echo $x;
echo "<br>=============变量传值--值传递================<br>";
//值传递，此种方式两个变量传递后没有关系
$m = 100;
$n = $m;
echo "\$n=" . $n;
echo "<br>=============变量传值--引用传递================<br>";
$j = 100;
$k =& $j;
$k = 200;//k的重新赋值将导致变量j值的改变
echo "\$j=" . $j . "----\$k=" . $k;

echo "<br>=============常量：一旦定义，通常数据不可改变================<br>
	1 常量不能以数字开头<br>
	2 通常以大写字母为主(与变量区别)<br>
	3 define和const定义常量有区别，主要在于权限<br>
	4 常量可以大小写，参见define的第三个参数<br>
	5 常量在定义的时候必须赋值且不可改变值<br>
	6 特殊符号定义的常量不能直接访问，可以使用constant('常量名')来访问<br>
	7 系统常量：系统帮助用户定义的常量";

//常量的定义方式：1 define('常量名','常量值') 2 const 常量名=值
define('PI', 3.14);

const PII = 3.14;
echo "<br>==========系统常量============================<br>";
echo "PHP_VERSION=" . PHP_VERSION . "<br>";
echo "PHP_INT_SIZE=" . PHP_INT_SIZE . "<br>";
echo "PHP_INT_MAX=" . PHP_INT_MAX . "<br>";

echo "<br>==========魔术常量：随环境变化，用户不可改变============================<br>";
echo "__DIR__=" . __DIR__ . "<br>";//当前执行脚本所在电脑的绝对路径
echo "__FILE__=" . __FILE__ . "<br>";//当前执行脚本所在电脑的绝对路径(带文件名)
echo "__LINE__=" . __LINE__ . "<br>";//当前所属的行号
echo "__NAMESPACE__=" . __NAMESPACE__ . "<br>";//当前所属的命名空间
echo "__CLASS__=" . __CLASS__ . "<br>";//当前所属的类
echo "__METHOD__=" . __METHOD__ . "<br>";//当前所属的方法


echo "<br>================PHP的八种数据类型======================<br>";
echo "<br>PHP是弱类型语言，变量本身没有数据类型<br>";
echo "<br>基本数据类型:<br>";
echo "<br>    1 整型：int/integer,4字节<br>";
echo "<br>    2 浮点数：float/double,8字节<br>";
echo "<br>    3 字符串数：string，系统根据实际长度分配<br>";
echo "<br>    4 布尔类型：bool/boolean，只有true和false两个值<br>";
echo "<br>复合数据类型:<br>";
echo "<br>    1 对象类型:object用来存放对象<br>";
echo "<br>    2 数组类型:array用来存放多个数据(一次性)<br>";
echo "<br>特殊数据类型:<br>";
echo "<br>    1 资源类型:resource，存放资源数据(php外部资源，如数据库、文件)<br>";
echo "<br>    2 空类型:NULL，只有一个值，不能运算<br>";

echo "<br>================数据类型转换======================<br>";
echo "<br>自动转换: 系统根据需求自己判断，用的比较多，效率偏低<br>";
echo "<br>强制转换: 人为根据需要的目标类型进行转换<hr>";

echo "基本转换规则:<br>
1 布尔true为1，false为0<br>
2 字符串转数值的规则<br>
&nbsp;&nbsp; 2.1 字母开头的字符串永远转为0<br>
&nbsp;&nbsp; 2.2 数字开头的字符串，取到碰到字符串为止(不会同时包含两个小数点)<br>";
$a = 'abc111';
$b = '1.1.1abc';
echo "====自动转换\$a + \$b=" . ($a + $b) . "<br>";

echo "====强制转换(float)\$a + (float)\$b=" . ((float)$a + (float)$b) . "<hr>";
echo "===============数据类型判断=============";
//bool类型不能用echo来输出，只能用var_dump()函数来输出
var_dump(is_int($a));//false
var_dump(is_string($a));//true

echo "<br>获取a类型:" . gettype($a);
settype($b, 'int');
echo "<br>改变b的类型:" . gettype($b);

echo "<hr>";
echo "===============数据比较=============<br>";

$a = '123';
$b = 123;
//判断相等
var_dump($a == $b);//true
//全等判断
var_dump($a === $b);//false


echo "<hr>";
echo "===============连接运算符：将PHP中的多个字符串连接在一起=============<br>";
$a = 'hello';
$b = 123456;
echo $a . $b . "<br>";
$a .= $b;
echo $a;

echo "<hr>";
echo "===============错误抑制符：@用在可能出错的表达式前即可=============<br>";
$c = 0;
@($a / $c);
echo "<hr>";
echo "===============分支结构：if分支=============<br>";
$day = 'sunday';
if ($day == 'sunday') {
    echo "go out";
} else {
    echo "work";
}

echo "<hr>";
echo "===============分支结构：switch分支=============<br>";
$a = "C";
switch ($a) {
    case "A":
        echo "aaa";
        break;
    case "B":
        echo "bbb";
        break;
    case "C":
        echo "ccc";
        break;
    default:
        echo "other...";
}

echo "<hr>";
echo "===============循环结构：for循环=============<br>";
for ($i = 1; $i <= 10; $i++) {
    echo $i, "<br>";
}
echo '最终i=' . $i;

echo "<hr>";
echo "===============循环结构：while循环=============<br>";
$i = 1;
while ($i < 10) {
    echo $i++, "<br>";
}

echo "<hr>";
echo "===============常用系统函数=============<br>";

echo print("hello world<br>");
print("hello world<br>");
$x = "hello world<br>";
print_r($x);


echo date('Y 年 m 月 d 日 H:i:s'), "<br>";
echo time(), "<br>";
echo microtime(), "<br>";

echo strtotime('tomorrow 10 hours'), "<br>";


echo "<hr>";
echo "===============文件加载原理=============<br>";
/*
 * PHP中被包含的文件是单独进行编译的；当被包含的文件有错误的时候，程序会在执行到include的时候才报错
 * PHP代码的执行流程：
 * 1 读取代码文件
 * 2 编译：将PHP代码转换为字节码(生成opcode)
 * 3 zendengine来解析opcode
 * 4 转换为对应的html文件
 *
 * require 和 include 的区别：
 * 1 本质都是包含文件，唯一的区别是包含不到对应文件的时候，报错的形式不一样。
 *
 * 2 include的错误级别较轻warn级别，不会阻止代码执行
 *   require则会阻止代码执行
 * */
include "include.php";
echo $a, "<br>";

require "require.php";
echo $b;


echo "<hr>";
echo "===============函数的使用=============<br>";
display();
function display()
{
    echo "hello world!!!", "<br>";//没有返回值
}

//在PHP中允许实参个数多余形参，函数内部不用而已
function add($arg1, $arg2)
{
    return $arg1 + $arg2;
}

$c = add(1, 2);
echo $c . "<br>";

/***
 * 默认值的定义是放在最右边，不能左边形参有默认值，但右边没有。
 * 也就是只要左边有默认值，右边的形参都要有默认值
 *
 * 函数外部定义的变量名字跟函数定义的形参名字冲突，是没有任何关系的。
 *
 * @param $num1
 * @param $num2
 * @return int|mixed
 */
function jian($num1 = 0, $num2 = 0)
{
    return $num1 - $num2;
}

echo jian(10), "<br>";


echo "===============函数的引用传递=============<br>";
function dis($a, &$b)
{
    $a = $a * $a;
    $b = $b * $b;
}

$a = 10;
$b = 5;
dis($a, $b);
echo "a=" . $a . "<br>";
echo "b=" . $b . "<br>";
//只有变量能够引用传递，所以第二个参数会引起报错！！！
//Fatal error: Only variables can be passed by reference in D:\Apache24\htdocs\index.php on line 265
//dis(10,5);

echo "===============作用域=============<br>";

/**
 * 全局变量：只允许在全局空间使用，理论上函数内部不能使用。
 * 局部变量：只允许在当前函数自己内部使用
 * 超全局变量：没有访问限制
 */

//全局变量
$global = 'global area';//最终会被系统纳入到超全局变量中:$GLOBALS['global']

function display_var()
{
    $inner = __FUNCTION__;//局部变量
    //访问全局变量 报错！因为全局变量不能在函数内部使用
    //Undefined variable: global
    //echo $global;
//    echo $GLOBALS['global'];//这样访问全局变量则是可以的

    //定义变量：使用全局变量
    global $global;
    echo $global . "<br>";

    //定义变量：全局不存在
    global $local;
    $local = 'inner' . "<br>";
}

display_var();

/**
 *
 *
 * Global关键字：是一种在函数内部定义变量的一种方式
 * 1 如果使用global定义的变量名在外部存在(全局变量)，那么系统在函数内部定义的变量直接指向外部全局变量，也就是指向同一空间
 * 2 如果使用global定义的变量名在外部不存在(全局变量)，系统会自动在全局空间(外部)定义一个与局部变量同名的全局变量
 *
 * 虽然可以，但一般不这么使用。
 */

echo $local;//跨域访问局部变量


echo "===============静态变量=============<br>";
//在函数内部定义的变量，使用static关键字修饰，用来实现跨函数共享数的变量.静态变量都是局部变量
//同一个函数被多次调用时使用
/***
 * 静态变量的原理：
 * 系统在进行编译的时候就对static进行初始化，为静态变量赋值。函数每次
 * 调用都在原来基础上来计算。
 *
 * 使用场景：
 * 1 统计使用：比如函数被调用的次数
 * 2 递归使用
 * @return void
 */

function display_static()
{
    static $count = 1;//静态变量
    echo $count++, "<br>";
}

display_static();//count=1
display_static();//count=2
display_static();//count=3
echo "===============可变函数=============<br>";
/**
 * 可变函数使用的还是比较多的
 * @return void
 */
function show()
{
    echo 'func name is:' . __FUNCTION__ . "<br>";
}

$func = 'show';
//直接使用变量来调用函数
$func();

//函数作为方法参数场景
function sys_add($f, $num1, $num2)
{
    return $f($num1, $num1);
}

function user_add($arg1, $arg2)
{
    return $arg1 + $arg2;
}

echo sys_add('user_add', 6, 5);
echo "<hr>";
echo "===============匿名函数(闭包)=============<br>";
/**
 * 变量保存匿名函数，本质上是返回一个对象(闭包对象)
 * 闭包的简单理解：
 *  函数内部的一些局部变量在函数执行完之后没有被释放，是因为在函数
 * 内部还有对应的函数在引用
 * @param $arg1
 * @param $arg2
 * @return mixed
 */
$custom_fun = function ($arg1, $arg2) {
    return $arg1 + $arg2;
};
echo $custom_fun(1, 2), "<br>";

//闭包函数
function display_bibao()
{
    $name = __FUNCTION__;

    //定义匿名函数  use就是将外部的局部变量保留给内部使用
    $innerFunction = function () use ($name) {
        echo "func name is: " . $name;
    };

    //调用内部函数
    return $innerFunction;
}

//display_bibao函数运行完之后，返回一个函数。但内部的$name此时并没有释放
$closure = display_bibao();
$closure();//仍然可以使用$name

echo "<hr><pre>";
echo "===============函数相关的函数=============<br>";

/***
 * func_get_arg 和 func_num_args都是统计实参
 * @param $a
 * @param $b
 * @return void
 */
function test($a, $b)
{
    //获取指定参数 参数标识从0开始
    var_dump(func_get_arg(1));
    //获取所有参数
    var_dump(func_get_args());
    //获取参数数量
    var_dump(func_num_args());
}

function_exists('test') && test(1, '2', 3, 4);

echo "<hr><pre>";
echo "===============错误处理=============<br>";
/**
 * 错误分类：
 * 1 语法错误：用户书写代码不符合PHP规范，语法错误会导致代码在编译过程中不通过，所以代码不会执行。
 * 2 运行错误：代码编译通过，但是代码在执行过程中会出现一些条件不满足导致的错误，运行时错误
 * 3 逻辑错误：逻辑错误，代码正常执行，但得不到预期的结果。
 *
 *
 *  所有看到的错误代码在PHP中都被定义成了系统常量，可以直接使用
 * 错误代号：
 * 1 系统错误
 * E_PARSE 编译错误，代码不会执行
 * E_ERROR  fatal eror，致命错误，会导致代码不能正确执行，在错误的位置断掉
 * E_WARING warning，警告错误，不会影响代码执行，但是可能得到意想不到的结果
 * E_NOTICE notice，通知错误，不影响代码执行
 *
 * 2 用户错误：E_USER_ERROR，E_USER_WARNING，E_USER_NOTICE
 * 用户在使用自定义错误触发的时候，会使用到的错误代号(系统不会用到)
 *
 * 3 其他：E_ALL 代表着所有错误，建议在开发环境使用
 *
 */
$b = 0;
if ($b == 0) {
    //Notice:  b不能为0！！！
    trigger_error("b不能为0！！！");//默认notice，代码继续执行
    //Fatal error:  b不能为0！！！
//    trigger_error("b不能为0！！！",E_USER_ERROR);//指定error级别，代码不会继续执行
}
echo "<hr><pre>";
echo "===============自定义错误处理函数=============<br>";
//自定义函数
/**
 * @param $errno 是系统提供的错误代码，比如E_ALL/E_NOTICE
 * @param $errstr
 * @param $errfile
 * @param $errline
 * @return void
 */
function my_error($errno, $errstr, $errfile, $errline)
{
    //判断当前会碰到的错误有哪些
    //排除系统本身就要排除的错误
    if (!(error_reporting() & $errno)) {//error_reporting没有参数代表获取当前系统错误处理对应的级别
        return false;
    }
    //开始判断错误类型
    switch ($errno) {
        case E_ERROR:
        case E_USER_ERROR:
            echo "fatal_error in file " . $errfile . ' on line ' . $errfile . "<br>";
            echo "error info : " . $errstr;
            break;
        case E_WARNING:
        case E_USER_WARNING:
            echo "warning_error in file " . $errfile . ' on line ' . $errfile . "<br>";
            echo "error info : " . $errstr;
            break;
        case E_NOTICE:
        case E_USER_NOTICE:
            echo "notice in file " . $errfile . ' on line ' . $errfile . "<br>";
            echo "error info : " . $errstr;
            break;
    }
    return true;
}

//注册自定义错误函数，来修改错误机制
set_error_handler('my_error');
//报错
echo $e;

echo "<hr><pre>";
echo "===============字符串定义=============<br>";

$str1 = "hello";
$str2 = 'hello';
//这两种方式没有区别
var_dump($str1, $str2);

//结构化定义
//heredoc结构
/**
 * 结构化定义注意：
 * 上EOD后不能有空格或者注释等任何内容
 * 下EOD必须前边顶格，且后边只能跟分号，而不能跟任何内容
 */
$str3 = <<<EOD
hello
    world
EOD;
//nowdoc结构
$str4 = <<<'EOD'
hello
    world
EOD;
var_dump($str3, $str4);

echo "<hr><pre>";
echo "===============字符串转义=============<br>";
$str1 = 'abc\r\ndef\t\'\"\$fg';
$str2 = "abc\r\ndef\t\'\"\$fg";
echo $str1, "<br>", $str2, "<br>";

$a = 'hello';
//变量识别
$str1 = 'abce $a dfg';
/**
 * 双引号中可以识别$定义的变量，因此输出会有hello在其中
 * 方式1 要保证变量的独立性，否则系统无法区分
 * 方式2 或者给变量两边加上花括号
 */
$str2 = "abce $a dfg";
echo $str1, "<br>", $str2, "<br>";
//符合方式2
$str3 = "abce{$a}dfg";
echo $str3 . "<br>";


echo "<hr><pre>";
echo "===============字符串长度（字节为单位strlen、mb_strlen）问题=============<br>";
$str1 = 'abssadasdas';//11
$str2 = '你好中国123';//15,因为中文占用3个字节
echo strlen($str1),//11
"<br>", strlen($str2),//15
"<br>", mb_strlen($str1),//11
"<br>", mb_strlen($str2);//7 UTF-8

echo "<hr><pre>";
echo "===============字符串相关函数=============<br>";
/**
 * implode(连接方式，数组):将数组中的元素按照某个规则连接成一个字符串
 * explode(分割字符，目标字符串):分割字符换变成数组
 * str_split(字符串，字符长度):按照指定长度拆分字符串得到数组
 *
 * trim():去除给定字符串左右空格(或指定内容)
 * ltrim()/rtrim():去除左、右空格
 *
 * substr(字符串，起始位置，长度);指定位置开始截取字符串，可以截取指定长度。不指定则截取到最后
 * strstr(字符换，匹配字符)： 从指定位置开始截取到最后
 *
 * strtolower():全部小写
 * strtoupper():全部大写
 * ucfirts()：首字符大写
 *
 * strpos(): 查找目标字符串中字符首次出现位置，返回的是位置信息。没有找到返回false，而不是0，注意哦
 * strrpos(): 查找字符在目标字符串中最后一次出现的位置。
 *
 * str_replace(匹配目标，替换内容，原始字符串): 替换目标字符串中的部分字符
 *
 *
 * printf/sprintf(输出字符串有占位符，顺序占位内容):格式化输出函数
 *
 * str_repeat():重复某个字符串n次
 */
$str = ' abcd e f  ';
var_dump(trim($str));
//字符串截取
echo substr($str, 1, 3) . "<br>";//abc
echo strstr($str, 'c') . "<br>";//cd e f

echo strtoupper($str), "<br>";

echo ucfirst($str) . "<br>";

$str = '123a234a3b2a';
//查找位置
echo strpos($str, 'a'), "<br>";//3
echo strrpos($str, 'a') . "<br>";//11

//字符串替换
echo str_replace('a', 'b', $str) . "<br>";//123b234b3b2b


//格式化输出
$age = 20;
echo sprintf("你好，今年我%d岁", $age) . "<br>";

//重复与打乱函数
$str = 'abcdef';
echo str_repeat($str, 5), "<br>";
echo str_shuffle($str);


echo "<hr><pre>";
echo "===============数组定义=============<br>";
/**
 * 数组类型：
 * 1 如果数组下标都是整数，叫做索引数组。
 * 2 如果数组下标都是字符串，叫做关联数。
 * 3 如果数组下标整数和字符串都存在，叫做混合数组。
 *
 * 数组顺序： 数组的顺序，跟放置顺序有关系，与下标无关。
 *
 * 特殊值下标的自动转换，比如bool值true和false，相应自动转换为1和0
 *
 * PHP中数组元素没有类型限制，与JAVA不一样。而且PHP数组没有长度限制。
 *
 * 补充：PHP中数组时很大的数据，所以存储在堆区
 */
//定义数组 array
$arr1 = array('1', 2, 'hello');
var_dump($arr1);

//定义数组：[] 与上述方式一样
$arr2 = ['1', 2, 'hello'];
var_dump($arr2);

//隐形数组
$arr3[] = 1;
$arr3[10] = 100;
$arr3[] = '1';//当前下标从前边最大的开始，也就是11
$arr3['key'] = 'value';
var_dump($arr3);

//特殊下标自动转换
/**
 * array(3) {
 * [0]=>
 * string(1) "a"
 * [1]=>
 * string(1) "b"
 * [""]=>
 * NULL
 * }
 */
$arr4[false] = 'a';
$arr4[true] = 'b';
$arr4[NULL] = NULL;
var_dump($arr4);
echo "<hr><pre>";
echo "===============数组遍历=============<br>";
echo "................foreach循环遍历......<br>";
//foreach遍历
$arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
foreach ($arr as $v) {
    echo $v, "<br>";
}
//获取下标的方式
foreach ($arr as $k => $v) {
    echo $k, "---->", $v, "<br>";
}


$arr = array(
    0 => array('name' => 'tom', 'age' => 10),
    1 => array('name' => 'jim', 'age' => 20)
);

foreach ($arr as $v) {
    //可以使用下标访问
    echo 'name is : ', $v['name'], '， and age is : ', $v['age'], '<br>';
}
echo ".....................for循环遍历......<br>";
//for循环遍历数组,要求：索引数组+下标规律
$arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
$len = count($arr);
for ($i = 0; $i < $len; $i++) {
    echo 'key is : ', $i, ' and value is : ', $arr[$i], "<br>";
}

echo ".....................each函数......<br>";
/**
 * each函数：each能够从一个数组中获取当前数组指针指向的元素下标&值。拿到之后将数组指针下移，同时
 * 将拿到的元素下标和值以一个四个元素的数组返回。
 * 下标0: 取得元素的下标值
 * 下标1：取得元素的值
 * key下标：取得元素的下标值
 * value下标：取得元素的值
 * each函数指针移动到数组末尾，则返回false
 */
//while配合each和list遍历数组
$arr = array(99, 'name' => 'tom', 3, 'age' => 10);
echo "<pre>";
/**
 * Array
 * (
 * [1] => 99 //数组当前指向下标为0的位置值为99
 * [value] => 99
 * [0] => 0 //数组当前指向下标为0
 * [key] => 0
 * )
 */
print_r(each($arr));
/**
 * 每当执行一次each，指针下移一次
 * Array
 * (
 * [1] => tom //数组当前指向下标为name位置的值为tom
 * [value] => tom
 * [0] => name //数组当前指向下标为name
 * [key] => name
 * )
 */
print_r(each($arr));
print_r(each($arr));
print_r(each($arr));
var_dump(each($arr));//false

echo "<pre>";
echo ".....................list函数......<br>";
/**
 * list函数：list函数是一种结构，算不上一种函数，没有返回值，是list提供一堆变量去一个数组中取得元素值，然后
 * 依次存放到对应的变量当中(批量为变量赋值：值来源于数组)
 *
 * list必须从索引数组中获取数据，而且必须从0开始。
 *
 * list和each的搭配使用是最好的，因为each一定有下标0和1
 */

$arr = array(1, 2 => 1);
list($first) = $arr;
var_dump($first);//int(1)
//下面这种写法会报错，因为second对应下标为1的元素，而数组根本没有下标1
//list($first, $second) = $arr;
//var_dump($first, $second);
$arr = array(99, 'name' => 'tom', 3, 'age' => 10);

while (list($k, $v) = each($arr)) {
    echo 'key is: ' . $k, '  ,and value is: ', $v, "<br>";
}

echo "<pre>";
echo ".....................数组排序......<br>";
$arr = array(3, 1, 5, 2, 0);
sort($arr);
/**
 * Array
 * (
 * [0] => 0
 * [1] => 1
 * [2] => 2
 * [3] => 3
 * [4] => 5
 * )
 */
print_r($arr);
/**
 * Array
 * (
 * [0] => 5
 * [1] => 3
 * [2] => 2
 * [3] => 1
 * [4] => 0
 * )
 */
rsort($arr);
print_r($arr);
//打乱数组
shuffle($arr);
print_r($arr);

echo "<pre>";
echo ".....................数组指针函数......<br>";
$arr = array(3, 1, 5, 2, 0);
echo current($arr), "<br>";//0
echo key($arr), "<br>";//0

//next和prev有可能导致指针移动到最前或者最后，离开数组导致数组不能使用，越界。
echo next($arr), next($arr), "<br>";//移动下标到2,3
echo prev($arr), "<br>";//向前移动一位到2

echo end($arr), "<br>";//重置下标为5
echo reset($arr), "<br>";//重置下标为0

echo "<pre>";
echo ".....................数组相关函数......<br>";
$arr = array();
//模拟栈
array_push($arr, 3);
array_push($arr, 2);
array_push($arr, 1);
print_r($arr);

echo array_pop($arr), "<br>";

//模拟队列
$arr = array();
array_unshift($arr, 3);
array_unshift($arr, 2);
array_unshift($arr, 1);
print_r($arr);

echo array_pop($arr),"<br>",array_pop($arr),"<br>";

//判断是否在数组中存在
$arr = array(1,3,5);
var_dump(in_array(6,$arr));//false


print_r(array_keys($arr));//输出所有key的数组
print_r(array_values($arr));//输出所有value的数组












