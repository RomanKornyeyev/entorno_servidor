<?php

    require('Usuario.php');
    require('UsuarioPremium.php');
    require('UsuarioAdministrador.php');
    require('../4-1_objetos_avanzados/Singleton.php');
    require('../4-1_objetos_avanzados/PlataformaPago.php');

    //singleton
    $variable = Singleton::singleton();
    $variable->setNombre("PRUEBAS SINGLETON");
    print $variable->getNombre();

    //interfaz
    

    $a = new Usuario('Román', 'Kornyeyev', 'Baloncesto');
    $b = new UsuarioPremium('Franco', 'Gianello', 'Fútbol');
    $c = new UsuarioAdministrador('Anabel', 'Pedrajas', 'Balonmano');

    //NORMALES
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

    //PREMIUM
    $b->introducirResultado("victoria");
    $b->introducirResultado("victoria");
    $b->introducirResultado("victoria");

    $b->introducirResultado("derrota");
    $b->introducirResultado("derrota");
    $b->introducirResultado("derrota");
    $b->introducirResultado("derrota");
    $b->introducirResultado("derrota");
    $b->introducirResultado("derrota");

    $b->introducirResultado("derrota");
    $b->introducirResultado("derrota");
    $b->introducirResultado("derrota");
    $b->introducirResultado("derrota");
    $b->introducirResultado("derrota");
    $b->introducirResultado("derrota");

    $b->mostrar();

    //ADMINS
    $c->introducirResultado("victoria");
    $c->introducirResultado("victoria");
    $c->introducirResultado("victoria");

    $c->introducirResultado("victoria");
    $c->introducirResultado("victoria");
    $c->introducirResultado("victoria");

    $c->introducirResultado("derrota");
    $c->introducirResultado("derrota");
    $c->introducirResultado("derrota");
    $c->introducirResultado("derrota");
    $c->introducirResultado("derrota");
    $c->introducirResultado("derrota");

    $c->mostrar();

    $c->crearPartido();
    
    
    

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
        ul{
            width: 90%;
            max-width: 750px;
            max-height: 200px;
            margin-bottom: 25px;
            overflow: scroll;
            text-align: center;
            border: 1px solid black;
        }
        
    </style>
</head>
<body>
    
</body>
</html>