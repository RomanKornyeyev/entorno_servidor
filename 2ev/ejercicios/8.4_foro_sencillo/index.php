<?php 

    require('./init.php');

    $stmt = $mbd->prepare("SELECT * FROM TEMAS");
    $stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>ForoSencillo - Inicio</title>
</head>
<body>
    <?php include('menu.php'); ?>
    <main class="main limit-width-1200">
        <h1 class="titulo">TEMAS</h1>
            
        <ul class="posts">
            <?php foreach ($stmt as $key => $fila) { ?>
                <li class='posts__post posts__post--darker'>
                    <div class='post__info'>
                        <strong><a href='tema.php?tema=<?=$fila['TNOMBRE']?>'><?=$fila['TNOMBRE']?></a></strong><br>
                    </div>
                    <div class='post__desc'>
                        <?=$fila['DESCRIPCION']?>                            
                    </div>
                </li>
            <?php }
                // Ya se ha terminado; se cierra
                $stmt = null;
                $mbd = null;
            ?>
        </ul>
    </main>
    <?php include('footer.php'); ?>
</body>
</html>