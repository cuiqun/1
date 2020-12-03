<?php
class Person extends \think\Controller {
    public function ChinaPerson(){
        echo '跑';
        echo "<br>";
        echo "跳";
    }
}
class Student extends Person{
    public function ChinaStudent(){
        echo "跳";
    }
}