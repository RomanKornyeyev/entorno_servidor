<?php 

    if ($sesion_iniciada) {
        $usuario = "<a href='perfil.php?usuario=".$user."'>".$user."</a>";
    }else{
        $usuario = $user;
    }

    echo "<nav class='nav-wrapper'>
            <div class='nav limit-width-1200 width-100vw'>
                <h1 class='logo'>ForoSencillo</h1>
                <div class='center-text'>
                    <a href='index.php'>Inicio</a>
                    <a href='lista.php'>Lista de usuarios</a>
                </div>
                <div class='flex-center-center gap-10'>
                    <h2> $usuario </h2>
                    $link_login
                </div>
            </div>
        </nav>";

?>