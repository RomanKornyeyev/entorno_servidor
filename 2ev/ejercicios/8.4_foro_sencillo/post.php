<?php 

    require('./init.php');

    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    //auto
    $id_post = "";
    $tema = "";
    $contenido = "";
    $errores = [];
    
    if (isset($_GET['id_post'])) {
        $id_post = $_GET['id_post'];
    }else if (isset($_POST['id_post'])) {
        $id_post = $_POST['id_post'];
    }

    //info del post
    $stmt2 = $mbd->prepare("SELECT * FROM POSTS WHERE ID_POST = :ID_POST");
    $stmt2->execute([':ID_POST' => $id_post]);
    $info_post = $stmt2->fetch();

    //1 - INSERTAMOS
    if (isset($_POST['submit'])) {
        //cargamos variables
        if (isset($_POST['contenido']) && $_POST['contenido'] != "" && $_POST['contenido'] != null) $contenido = clean_input($_POST['contenido']);
        else $errores['contenido'] = "<span class='error'>*El campo contenido no puede estar vacío</span>";

        //si no hay errores (campos vacíos)
        if (count($errores) == 0) {
            // Prepare
            $stmt = $mbd->prepare("INSERT INTO RESPUESTAS (ID_POST, CONTENIDO, NOMBRE) VALUES (:ID_POST, :CONTENIDO, :NOMBRE)");
            // Bind
            $stmt->bindParam(':ID_POST', $id_post);
            $stmt->bindParam(':CONTENIDO', $contenido);
            $stmt->bindParam(':NOMBRE', $user);
            // Excecute
            $stmt->execute();

            //vaciamos inputs, tras enviarse la respuesta correctamente
            $contenido = "";
        }
        
    }
    

    //2 - buscamos todos los posts para mostrarlos
    $stmt = $mbd->prepare("SELECT * FROM RESPUESTAS WHERE ID_POST = :ID_POST");
    $stmt->execute([':ID_POST' => $id_post]);

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>ForoSencillo - <?=$info_post['TITULO']?></title>
</head>
<body>
    <?php include('menu.php'); ?>
    <main class="main limit-width-1200">
        <h1 class="titulo"><?=$tema?></h1>
            <h1><a href='perfil.php?usuario="<?=$info_post['TITULO']?>"'><?=$info_post['TITULO']?></a></h1><br>
            <ul class='posts'>
                <li class='posts__respuesta'>
                    <div class='respuesta__info'>
                        <strong><a href='perfil.php?usuario="<?=$info_post['NOMBRE']?>"'><?=$info_post['NOMBRE']?></a></strong><br>
                    </div>
                    <div class='respuesta__desc'>
                        <?=$info_post['CONTENIDO']?>
                    </div>
                </li>
            

                <?php foreach ($stmt as $key => $fila) { ?>
                    <li class='posts__respuesta'>
                        <div class='respuesta__info'>
                            <strong><a href='perfil.php?usuario="<?=$fila['NOMBRE']?>"'><?=$fila['NOMBRE']?></a></strong><br>
                        </div>
                        <div class='respuesta__desc'>
                            <?=$fila['CONTENIDO']?>
                        </div>
                    </li>
                <?php }
                    // Ya se ha terminado; se cierra
                    $stmt = null;
                    $mbd = null;
                ?>
        

                <?php if(!$sesion_iniciada){ ?>
                    <div class="posts__post posts__post--nuevo">
                        ¿Quieres responder? <a href='login.php?url=post.php?id_post=<?=$id_post?>'>Inicia sesión</a>
                    </div>
                <?php }else{ ?>
                    <form action="post.php?id_post=<?=$id_post?>" method="post" class="limit-width-1200 flex-center-center gap-15 posts__post posts__post--nuevo">
                            <h3>¿QUIERES RESPONDER?</h3>
                            <p class="input-wrapper">
                                <label for="contenido">Contenido:</label>
                                <textarea name="contenido" id="contenido" cols="30" rows="10" class="input" maxlength="500"><?=$contenido?></textarea>
                                <input type="hidden" name="id_post" id="id_post" value="<?=$id_post?>">
                                <?php if(isset($errores['contenido'])) echo $errores['contenido']."<br>" ?>
                            </p>
                            <p class="input-wrapper">
                                <button type="submit" name="submit" class="login-button">Responder</button>
                            </p>
                    </form>
                <?php } ?> 
            </ul>
    </main>
    <?php include('footer.php'); ?>
</body>
</html>