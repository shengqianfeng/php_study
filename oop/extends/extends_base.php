<?php
class Human{
    const CALL = "人";
    public $name = 'human';
    protected $age = 100;
    private $money = 200;
    protected static $type = array('black','red','blue');

    /**
     * 有参构造器
     * @param $money
     */
    public function __construct($money){
        $this->money = $money;
    }

    /**
     * 析构函数：
     *  子类对象消亡的时候，父类的析构函数会被调用
     */
    public function __destruct(){
        echo "die";
    }

    public function showName(){
        return $this->name;
    }

    protected function showAge(){
        return $this->age;
    }

    private function showMoney(){
        return $this->money;
    }
    public function display(){
        echo __CLASS__,"I am a super man!<br>";
    }

    /**
     * 父类可以提供一个public方法来让子类访问自己的private属性
     * @return int
     */
    public function getSuperPrivateMoney()
    {
       return $this->showMoney();
    }

    /**
     * php中的静态成员或常量，是通过类名来进行访问的，而不是对象。
     * @return string[]
     */
    protected function getSuperType(){
        return self::$type;
    }
}

/**
 * 父类所有的属性都可以被继承
 */
class Man extends Human{
    public $name = 'Man';
    public $age = 10;

    public function getFatcher(){
        //当子类没有自己的属性时，父类的public和protected方法可以被访问
        $name = $this->showName();
        $age = $this->showAge();
        echo "name is: ",$name," and age is: ",$age;
        //private方法无法被继承访问
//        $money = $this->showMoney();
    }

    public function ofType(): array
    {
        return $this->getSuperType();
    }

    /**
     * Override重写：子类可以与父类方法签名相同的方法
     * @return void
     */
    public function display(){
        echo __CLASS__,"I am a man<br>";
    }

    public function showAge($age=0){
        return $this->age;
    }

    /**
     * parent不能访问父类属性，但是可以访问父类的静态属性、静态方法、类常量、普通方法
     * @return string
     */
    public function showSuperCall(): string
    {
        return parent::CALL;
    }


}
/**
 * 子类会继承父类的构造方法
 * 此时子类如果想直接new Man();是不行的。因为继承了父类的有参构造器
 */

$m = new Man(50);
echo "Man name is :",$m->name,"<br>";
echo "Man age is :",$m->showAge(),"<br>";
echo "parent is called: ",$m->showSuperCall(),"<br>",
//受保护的父类属性无法直接被子类对象访问，必须通过访问父类提供的public方法来访问
//echo $m->age;
//$m->display();
var_dump($m);
echo "<hr>";
$arrType = $m->ofType();
foreach ($arrType as $type){
    echo "array type has :",$type,"<br>";
}
echo "<hr>";
echo "name is: ",$m->showName();
echo "<br>称呼CALL: ",Man::CALL;
echo "<br>有钱:",$m->getSuperPrivateMoney();


echo "<hr>";
