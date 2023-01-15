<?php 

    //sesion start (siempre de lo primero)
    session_name("LoginForoSencillo");
    session_start();

    

    //acceso a BD
    try{
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        //mysql:servidor:database, usuario(roman), contra(123456)
        $mbd = new PDO('mysql:host=localhost;dbname=foroSencillo;charset=utf8mb4', "roman", "123456", $options);
    }catch(PDOException $e){
        print "Error en BD";
        die();
    }

    $user = 'Anónimo';
    $user = isset($_SESSION["user"])?"<a href='perfil.php?usuario=".$_SESSION["user"]."'>".$_SESSION["user"]."</a>":$user;

?>