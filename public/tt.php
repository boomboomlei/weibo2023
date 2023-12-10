<?php



$v5=10;
$GLOBALS['v6']=20;
var_dump($v6);
$v6=20;

   
function f3(){
    
        global $v5;
        $v5=$v5+5;
    
        $GLOBALS['v6']=$GLOBALS['v6']+6;
        unset($v5);
        unset($GLOBALS['v6']);
}

f3();
var_dump($v5,$v6);

echo "********************";
$arr=array(1,2,3,4,5);
$res=array_map(function($v){ return $v*3;},$arr);

var_dump($res);


$array=['name'=>'kery','age'=>15,'gender'=>'male'];
echo "<pre>";
list($key,$value)=each($array);
var_dump($key,$value);

echo "<br>";
while(list($key,$value)=each($array)){
        var_dump($key,$value);
        echo "<br>";
}




?>