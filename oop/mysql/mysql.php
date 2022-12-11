<?php
class mysql
{
    private $host;
    private $port;
    private $username;
    private $password;
    private $dbname;
    private $charset;
    private $link;

    public function __construct(array $info = array()){
        $this->host = isset($info['host']) ? $info['host'] : 'localhost';
        $this->port = isset($info['port']) ? $info['port'] : '3306';
        $this->username = isset($info['username']) ? $info['username'] : 'root';
        $this->password = isset($info['password']) ? $info['password'] : '123456';
        $this->dbname = isset($info['dbname']) ? $info['dbname'] : 'test';
        $this->charset = isset($info['charset']) ? $info['charset'] : 'utf8';
        $this->connect();
        $this->charset();
    }

    //数据库连接认证 利用mysqli来认证
    private function connect(){
        $this->link= $link = new mysqli($this->host ,$this->username, $this->password,$this->dbname,$this->port);
        //验证连接
        if($link->connect_error){
            die('Connect error ('.$link->connect_errno.')'.$link->connect_error);
        }else{
            echo '<br>mysql connection success!<br>';
        }
    }

    private function charset(){
        $sql = "set names {$this->charset}";
        $res = $this->link->query($sql);
        if(!$res){
            die('Connect error ('.$this->link->errno.')'.$this->link->error);
        }else{
            echo '<br>set charset success!<br>';
        }

    }

    public function sql_exec($sql){
        $res = $this->link->query($sql);
        if(!$res){
            die('sql error ('.$this->link->errno.')'.$this->link->error);
        }
        $rows = $this->link->affected_rows;
        echo "<br>"."写操作受影响的行数:".$rows."<br>";
        return $res;
    }

    public function sql_query($sql,$all = false){
        $res = $this->link->query($sql);
        if(!$res){
            die('sql error ('.$this->link->errno.')'.$this->link->error);
        }
        $rows = $this->link->affected_rows;
        echo "查询出的行数:".$rows."<br>";
        if($all){
            //获取所有数据
           return $res->fetch_all(MYSQLI_ASSOC);
        }else{
            //获取一条
            return $res->fetch_assoc();
        }
    }

    public function sql_last_id(){
        return $this->link->insert_id;
    }
}

$mysql = new mysql();
echo "<hr>";
var_dump($mysql);

$sql = "select * from t_news";
$res = $mysql->sql_query($sql);
echo "<hr>";
var_dump($res);

$sql = "delete from t_num where id=2";
$res = $mysql->sql_exec($sql);
echo "<hr>";
var_dump($res);

echo "<hr>";
$sql = "insert into t_num(`num`) values (1)";
$mysql->sql_exec($sql);
echo "新插入数据ID：".$mysql->sql_last_id();