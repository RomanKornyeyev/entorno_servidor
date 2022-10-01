<?php 
    function directory() {
       $dir = './';
       $files = scandir($dir);

       echo "<ul class='lista'>";
           foreach($files as $file) {
               if (preg_match("/.php\b/",$file)){
                   echo "<li class='elemento'><a class='button' href=".$dir."/".$file.">".$file."</a></li>";
               }
           }
       echo "<ul>";
    }
?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JS -->
    <script src="./js/scrollreveal-lib.js"></script>
    <script src="./js/sr-index.js" defer=""></script>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/index.css">
    <title>Inicio</title>
 </head>
 <body>
    <main class="container">
    <!-- <div class="mark mark-before">&lt;main&gt;</div> -->
    <div class="title-wrapper"><h2 class="title">Ejercicios de Román Kornyeyev</h2></div>
        <?php 
            directory();
        ?>
        <!-- <div class="mark mark--after">&lt;/main&gt;</div> -->
    </main>
 </body>
 </html>