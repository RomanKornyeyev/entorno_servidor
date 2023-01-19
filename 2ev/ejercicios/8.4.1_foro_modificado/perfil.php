<?php 

    require('./init.php');
    require('private_area.php');

    if (isset($_GET['usuario'])) {
        $user_buscado = $_GET['usuario'];
    }else if (isset($_POST['usuario'])) {
        $user_buscado = $_POST['usuario'];
    }

    
    $stmt = null;
    $stmt = $mbd->prepare("SELECT NOMBRE FROM USUARIOS WHERE NOMBRE = :NOMBRE LIMIT 1");
    $stmt->execute([':NOMBRE' => $user_buscado]);
    $user_buscado = $stmt->fetch();

    $link_deslogueo ="";
    if ($user_buscado['NOMBRE'] == $_SESSION["user"]) {
        $link_deslogueo = "<a href='logout.php'>Cerrar sesión</a>";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>ForoSencillo - <?=$user_buscado['NOMBRE']?></title>
</head>
<body>
    <?php include('menu.php'); ?>
    <main class="main limit-width-1200 perfil">
        <h3 class="titulo"><?=$user_buscado['NOMBRE']?></h3>
        <p>
            Este es el perfil de <strong><?=$user_buscado['NOMBRE']?></strong>. La descripciones se añadirán más adelante... 
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, iusto deleniti explicabo velit magni quis?
        </p>
        <?=$link_deslogueo?>
    </main>
    <?php include('footer.php'); ?>
</body>
</html>