<?php

    try{
        //mysql:servidor:database, usuario(roman), contra(123456)
        $mbd = new PDO('mysql:host=localhost;dbname=mibasededatos', "roman", "123456");
    }catch(PDOException $e){
        print "¡Error!: " . $e->getMessage() . "\n";
        die();
    }
    

?>