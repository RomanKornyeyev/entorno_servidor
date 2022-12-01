<?php

    try{
        //mysql:servidor:database, usuario(roman), contra(123456)
        $mbd = new PDO('mysql:host=localhost;dbname=examen', "examen", "examen");
    }catch(PDOException $e){
        print "¡Error!: " . $e->getMessage() . "\n";
        die();
    }
    

?>