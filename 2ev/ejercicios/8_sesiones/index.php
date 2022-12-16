<?php

    session_name("manoloFramework");
    session_start();
    print_r($_SESSION);


    $intentos=isset($_SESSION["intentos"])?$_SESSION["intentos"]:4;
    $intentos--;
    $_SESSION["intentos"]=$intentos;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <br>
    
    <?php echo "te quedan $intentos intentos"; ?>
</body>

</html>