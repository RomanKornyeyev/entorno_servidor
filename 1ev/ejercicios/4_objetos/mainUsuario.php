<?php

    require('Usuario.php');

    $a = new Usuario('Román', 'Kornyeyev', 'Baloncesto');
    $b = new Usuario('Francis', 'Gianello', 'Fútbol');
    $c = new Usuario('Anabel', 'Pedrajas', 'Balonmano');

    print $a->mostrar();
    print $b->mostrar();
    print $c->mostrar();

    $a->introducirResultado("victoria");
    $a->introducirResultado("victoria");
    $a->introducirResultado("victoria");
    $a->introducirResultado("victoria");
    $a->introducirResultado("victoria");
    $a->introducirResultado("victoria");
    
    $a->introducirResultado("victoria");
    $a->introducirResultado("victoria");
    $a->introducirResultado("victoria");
    $a->introducirResultado("victoria");
    $a->introducirResultado("victoria");
    $a->introducirResultado("victoria");

    $a->introducirResultado("derrota");
    $a->introducirResultado("derrota");
    $a->introducirResultado("derrota");
    $a->introducirResultado("derrota");
    $a->introducirResultado("derrota");
    $a->introducirResultado("derrota");

    $a->mostrar();
    
    
    
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *,*::before,*::after{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body{
            padding: 25px;
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
        }
        .azulito{
            width: 90%;
            max-width: 750px;
            padding: 25px;
            background-color:#69b0c7;
            border: 1px solid gray;
            border-bottom: none;
        }
        
    </style>
</head>
<body>
    
</body>
</html>