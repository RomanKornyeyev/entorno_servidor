<?php

    try{
        $mdb = new PDO('mysql:host=localhost;dbname=mibasededatos', "roman", "123456");
    }catch(PDOException $e){
        print "¡Error!: " . $e->getMessage() . "\n";
        die();
    }
    

?>