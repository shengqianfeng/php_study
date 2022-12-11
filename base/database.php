<?php
//与数据库建立连接
$link = mysqli_connect('localhost', 'root', 123456);
echo "<hr>";
//连接资源$link也是超全局的，任何地方都可以使用该连接资源进行操作
var_dump($link);
echo "<hr><pre>";
//设置连接编码
$res = mysqli_set_charset($link, "utf8");
var_dump($res);//true
echo "<hr><pre>";
//选择数据库
$res = mysqli_select_db($link, 'test');
var_dump($res);//true