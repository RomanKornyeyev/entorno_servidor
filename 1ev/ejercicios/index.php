<?php
function navigate()
{
    $root = '.';
    $dirs = scandir($root);

    foreach ($dirs as $dir) :
        if (is_dir($dir) && strlen($dir) > 4) {
            $subDir = scandir($dir);
?>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle m-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $dir ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php
                    foreach ($subDir as $d) {
                        if (str_ends_with($d, ".php")) :
                    ?>
                            <a class="dropdown-item" href="<?= $dir . "/" . $d ?>"><?= $d ?></a>
                    <?php
                        endif;
                    }
                    ?>
                </div>
            </div>

<?php

        }
    endforeach;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <!-- Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>

<body class="">
    <header>
        <h1 class="h1 m-3 p-3 ">Entorno Servidor</h1>
        <hr class="m-3">
    </header>
    <div class="d-flex flex-wrap justify-content-center">
        <?php
        navigate();
        ?>
    </div>

</body>

</html>