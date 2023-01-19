<?php
//conexion BD y sesion_start
require("./init.php");

//los header y die, también tienen que ir de lo primero
if (isset($_SESSION['user'])) {
    header("Location: index.php");
    die();
}

function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$login = "";
$pass = "";
$url = "";
$errorList = [];

if (isset($_GET['url'])) {
    $url = $_GET['url'];
}else if (isset($_POST['url'])) {
    $url = $_POST['url'];
}

//debugging
//echo $url;

if(isset($_POST["submit"])) {
    //nombre
    if(isset($_POST["login"])){
        $login = clean_input($_POST["login"]);
    }

    //password
    if(isset($_POST["password"])){
        $password = clean_input($_POST["password"]);
    }

    //consulta en BD
    $consulta = $mbd->prepare("SELECT * FROM USUARIOS WHERE NOMBRE = :NOMBRE LIMIT 1");
    $consulta->execute([':NOMBRE' => $login]);
    $user = $consulta->fetch();
    //$user = ['NOMBRE' => 'Roman', 'PASSWD' => 'asdads']
    //print_r($user);

    // $sql="SELECT * FROM usuarios WHERE user = ? AND password=?";

    if(isset($user) && password_verify($password, $user['PASSWD']) ){
        $_SESSION["user"] = $login;
        if ($url != "") {
            header('Location: '.$url);
        }else{
            header('Location: index.php');
        }
        exit;
    }else{
        $errorList[] = "Nombre o clave erróneo/a";
    }
}


if(isset($_GET["error"])){
    $errorList[] = $_GET["error"];
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>ForoSencillo - Login</title>
</head>
<body>
    <?php include('menu.php'); ?>
    <form action="login.php" method="post" class="main limit-width-1200 flex-center-center">
        <div class="login">
            <p class="input-wrapper">
                <label for="login">Nombre:</label>
                <input type="text" name="login" id="login" value="<?=$login?>" class="input">
                <input type="hidden" name="url" id="url" value="<?=$url?>">
            </p>
            <p class="input-wrapper">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="" class="input">
            </p>
            <?php if (count($errorList)>0) { ?>
                <p>
                    <?php foreach($errorList as $error) { ?>
                        <div class="error"><?= $error ?></div>
                    <?php } ?>
                </p>
            <?php }?>
            <p class="input-wrapper">
                <button type="submit" name="submit" class="login-button">Login</button>
            </p>
        </div>
    </form>
    <?php include('footer.php'); ?>
</body>
</html>