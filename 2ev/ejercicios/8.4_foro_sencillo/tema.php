<?php 

    require('./init.php');

    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $tema = "";
    
    if (isset($_GET['tema'])) {
        $tema = clean_input($_GET['tema']);
    }else if (isset($_POST['tema'])) {
        $tema = clean_input($_POST['tema']);
    }

    //si no hay posts en este tema, resetear el ID_POST a 1 (en este tema)
    $stmt = $mbd->prepare("SELECT * FROM POSTS WHERE TNOMBRE = :TNOMBRE");
    $stmt->execute([':TNOMBRE' => $tema]);
    $contador=0;
    foreach ($stmt as $valor) {
        $contador++;
    }
    if ($contador == 0) {
        $contador = 1;
    } 















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
        <?php 
            echo "<ul class='posts'>";
            foreach ($stmt as $key => $fila) {
                //pintamos cuerpo
                echo "<li class='posts__post'>";
                echo "<div class='post__info'>";
                echo "<strong><a href='post.php?tema=".$fila['TNOMBRE']."&ID_POST=".$fila['ID_POST']."'>".$fila['TITULO']."</a></strong><br>";
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
    </main>
    <?php include('footer.php'); ?>
</body>
</html>