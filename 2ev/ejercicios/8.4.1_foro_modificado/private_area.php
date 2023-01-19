<?php 
    //a lo mejor no hace falta aqui
    if( !isset($_SESSION['user']) ){
        //si el user desde un principio quiere entrar a un área privada (sin loguearse),
        //al loguarse se le redirigirá a la página donde intentó acceder
        header('Location: login.php?error=Área privada&url='.$_SERVER["REQUEST_URI"]);
        exit;
    }

?>