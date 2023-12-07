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




?>