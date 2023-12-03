<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function home(){
        return view("static_pages/home");
    }
    public function help(){
        return view("static_pages/help");
    }
    public function about(){
        return view("static_pages/about");
    }
    public function test(){
       
        $name="55555";

        var_dump($_SERVER);
       // unset($name);
        echo $name;
        for($i=0;$i<=9;$i++){
            for($j=0;$j<=9;$j++){
                $res=$j*$i;
                echo "$i * $j = $res\t";
               
            }
            echo "\r\n";
        }

        echo "<hr>";
        $c='ch';
        if($c == 'us'){
            echo "8888";
        }else if($c=='ch'){
            echo '9999';
        }
        echo "**************day4**********************";
        // for($a=32;$a<=126;$a++){
        //     $hex_a=dechex($a);
        //     $char="\x$hex_a\";
        //     $eval_str="echo $char ;";
        //     eval($eval_str);
        //     echo '&nbsp';
        // }
       // return view("static_pages/test");
    }
}
