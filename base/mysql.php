<?php
//引入数据库初始化操作
include_once 'database.php';
//数据库的增删改查操作
echo "<hr>";
/**
 * mysql的query函数执行结果返回的是true或者false，true代表执行成功，false代表执行失败
 * 失败原因一般是：1 sql语法错误 2 执行失败
 */
$sql = "delete from t_news";
if (mysqli_query($link, $sql)) {
    echo "数据清空成功！" . "<br>";
} else {
    echo "数据清空失败!" . "<br>";
}


    $pub_time = time();
    $sql = "insert into t_news values(null,'itcast黑马程序员',1,'很棒','jeff',{$pub_time})";
    if (mysqli_query($link, $sql)) {
        echo "数据插入成功！" . "<br>";
    } else {
        echo "数据插入失败!" . "<br>";
    }




$sql = "select * from t_news";
$res = mysqli_query($link, $sql);
var_dump($res);
if ($res) {
    echo "数据查询成功！" . "<br>" . "结果集个数：" . mysqli_num_rows($res) . "<br>";
    //解析结果集
//    $rows_1 = mysqli_fetch_assoc($res);
//    echo "<pre>";
//    print_r($rows_1);
    echo "<pre>";
    //只获取记录值
    $rows_2 = mysqli_fetch_row($res);
    print_r($rows_2);
    //获取结果集的字段数
    echo mysqli_num_fields($res)."<br>";//6
} else {
    echo "数据查询失败!" . "<br>";
}

//更新操作
$sql = "update t_news set content = '真的很棒吗?' where id = 1";
if (mysqli_query($link, $sql)) {
    echo "数据更新成功！" . "<br>";
} else {
    echo "数据更新失败!" . "<br>";
}
//删除操作
$sql = "delete from t_news where id = 1";
if (mysqli_query($link, $sql)) {
    echo "数据删除成功！" . "<br>";
} else {
    echo "数据删除失败!" . "<br>";
}
//mysql释放连接资源，PHP脚本执行完之后会自动释放
mysqli_close($link);