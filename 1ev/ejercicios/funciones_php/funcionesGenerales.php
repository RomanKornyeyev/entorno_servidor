<?php 
    //=== FUNCIONES GENERALES ===
    function imprimirVariable($var){
        echo $var;
    }
    function imprimirArray($arr){
        for ($i = 0; $i < count($arr); $i++) {
            if($i != count($arr)-1) echo $arr[$i].", ";
            else echo $arr[$i];
        }
    }
    function imprimirMatriz($arr){
        for ($i=0;$i<count($arr);$i++) {
            for ($j=0;$j<count($arr[$i]);$j++){
                echo " " . $arr[$i][$j];
            }
        }
    }
?>