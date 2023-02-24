<!-- Cuando inicio sesión, cargo $_SESSION['id'], $_SESSION['nombre'], $_SESSION['id_grupo'] y $_SESSION['nb_grupo'] -->
<!-- Ergo, para saber si el usuario tiene la sesión iniciada, nos basta con ver si tiene un isset de cualquiera de estos sessions -->
<div class="menu">
  <a href="index.php">Inicio</a>

  <!-- si el user tiene sesión iniciada -->
  <?php if (isset($_SESSION['nombre'])) { ?>
    <!-- si el user es admin -->
    <?php if ($_SESSION['nb_grupo'] == DWESBaseDatos::ADMIN) { ?>
      <a href="admin.php">Admin</a>
    <?php } ?>
    <a href="privado.php">Privado</a>
  <?php } ?>
  
  <a href="login.php">Login</a>
  <a href="logout.php">Logout</a>
  -
  Bienvenido: <?=$userName?> - grupo: <?=$userGroup?>
</div>
