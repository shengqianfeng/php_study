<?php
echo "<pre>";
var_dump($_GET);

echo "<hr>";
var_dump($_POST);

//将$_POST和$_GET中的数据合并到一个数组，如果存在同名下标，POST会覆盖GET
echo "<hr>";
var_dump($_REQUEST);

//数据处理
echo "<hr>";
$hobby = $_POST['hobby'];
//判断1是否在数组中存在
var_dump(in_array(1,$hobby));
//将数组中元素以|分割拼接为字符串
$hobby_str = implode($hobby,'|');
echo $hobby_str."<br>";
//从字符串转换为数组
var_dump(explode('|',$hobby_str));