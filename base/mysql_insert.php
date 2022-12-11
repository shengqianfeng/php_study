<?php
//引入数据库初始化操作
include_once 'database.php';
//数据库的增删改查操作
echo "<hr>";

$pub_time = time();
$sql = "insert into t_news values(null,'金瓶梅',1,'很棒','无名氏',{$pub_time})";
if (mysqli_query($link, $sql)) {
    echo "数据插入成功！" . "<br>自增ID为:".mysqli_insert_id($link);
} else {
    echo "sql指令错误，错误编码:".mysqli_errno($link)."<br>";
    echo "sql指令错误，错误信息:".mysqli_error($link)."<br>";
    //终止代码执行
    exit();
}
