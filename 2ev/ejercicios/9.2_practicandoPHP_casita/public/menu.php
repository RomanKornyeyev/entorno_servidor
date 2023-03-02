<h1>Hola <?=$username?></h1>
<a href="index.php">index</a>
<a href="login.php">login</a>
<a href="register.php">register</a>
<?php if(isset($_SESSION['nombre'])) {?>
    <a href="private.php">private (privada)</a>
<?php } ?>
<a href="logout.php">logout</a>
<hr>