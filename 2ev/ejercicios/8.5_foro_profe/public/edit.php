<?php 

    if (!isset($_SESSION['user']) || $_SESSION['user'] == "") {
        header("Location: login.php?redirect=edit.php");
        die();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Aquí va el formulario para editar tu perfil</h1>
</body>
</html>