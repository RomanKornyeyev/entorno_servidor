<?php 

    require('./init.php');

    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $tema = "";
    $titulo = "";
    $contenido = "";
    $errores = [];
    
    if (isset($_GET['tema'])) {
        $tema = clean_input($_GET['tema']);
    }else if (isset($_POST['tema'])) {
        $tema = clean_input($_POST['tema']);
    }

    //1 - INSERTAMOS
    //cargamos variables
    if (isset($_POST['submit'])) {
        if (isset($_POST['titulo']) && $_POST['titulo'] != "" && $_POST['titulo'] != null) $titulo = clean_input($_POST['titulo']);
        else $errores['titulo'] = "<span class='error'>*El campo titulo no puede estar vacío</span>";

        if (isset($_POST['contenido']) && $_POST['contenido'] != "" && $_POST['contenido'] != null) $contenido = clean_input($_POST['contenido']);
        else $errores['contenido'] = "<span class='error'>*El campo contenido no puede estar vacío</span>";

        //si no hay errores (campos vacíos)
        if (count($errores) == 0) {
            // Prepare
            $stmt = $mbd->prepare("INSERT INTO POSTS (TNOMBRE, NOMBRE, TITULO, CONTENIDO) VALUES (:TNOMBRE, :NOMBRE, :TITULO, :CONTENIDO)");
            // Bind
            $stmt->bindParam(':TNOMBRE', $tema);
            $stmt->bindParam(':NOMBRE', $user);
            $stmt->bindParam(':TITULO', $titulo);
            $stmt->bindParam(':CONTENIDO', $contenido);
            // Excecute
            $stmt->execute();

            $titulo = "";
            $contenido = "";
        }
        
    }
    
    

    //2 - buscamos todos los posts para mostrarlos
    $stmt = $mbd->prepare("SELECT * FROM POSTS WHERE TNOMBRE = :TNOMBRE");
    $stmt->execute([':TNOMBRE' => $tema]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>ForoSencillo - <?=$tema?></title>
</head>
<body>
    <?php include('menu.php'); ?>
    <main class="main limit-width-1200">
        <h1 class="titulo"><?=$tema?></h1>
        <?php 
            echo "<ul class='posts'>";
            foreach ($stmt as $key => $fila) {
                //pintamos cuerpo
                echo "<li class='posts__post'>";
                echo "<div class='post__info'>";
                echo "<strong><a href='post.php?id_post=".$fila['ID_POST']."'>".$fila['TITULO']."</a></strong><br>";
                echo "<small><a href='perfil.php?usuario=".$fila['NOMBRE']."'>".$fila['NOMBRE']."</a></small>" ;
                echo "</div>";

                echo "<div class='post__desc'>";
                echo $fila['CONTENIDO'];
                echo "</div>";
                echo "</li>";
            }

            // Ya se ha terminado; se cierra
            $stmt = null;
            $mbd = null;
        ?>

        <?php if(!$sesion_iniciada){ ?>
            <div class="posts__post posts__post--nuevo">
                ¿Quieres crear un nuevo post? <a href='login.php?url=tema.php?tema=<?=$tema?>'>Inicia sesión</a>
            </div>
        <?php }else{ ?>
            <form action="tema.php?tema=<?=$tema?>" method="post" class="limit-width-1200 flex-center-center gap-15 posts__post posts__post--nuevo">
                    <h3>Crea un post</h3>
                    <p class="input-wrapper">
                        <label for="titulo">Título:</label>
                        <input type="hidden" name="tema" id="tema" value="<?=$tema?>">
                        <input type="text" name="titulo" id="titulo" value="<?=$titulo?>" class="input">
                        <?php if(isset($errores['titulo'])) echo $errores['titulo']."<br>" ?>
                    </p>
                    <p class="input-wrapper">
                        <label for="contenido">Contenido:</label>
                        <textarea name="contenido" id="contenido" cols="30" rows="10" class="input" maxlength="500"><?=$contenido?></textarea>
                        <?php if(isset($errores['contenido'])) echo $errores['contenido']."<br>" ?>
                    </p>
                    <p class="input-wrapper">
                        <button type="submit" name="submit" class="login-button">Crear</button>
                    </p>
            </form>
        <?php } ?>
    </main>
    <?php include('footer.php'); ?>
</body>
</html>