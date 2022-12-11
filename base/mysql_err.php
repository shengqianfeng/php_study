<?php
//引入数据库初始化操作
include_once 'database.php';
//数据库的增删改查操作
echo "<hr>";

$sql = "select * from n_news";
$res = mysqli_query($link, $sql);
if(!$res){
    echo "sql指令错误，错误编码:".mysqli_errno($link)."<br>";
    echo "sql指令错误，错误信息:".mysqli_error($link)."<br>";
    //终止代码执行
    exit();
}
echo "========================";