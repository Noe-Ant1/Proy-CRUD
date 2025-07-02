<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Naik.com</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imgs/icon.ico" type="image/x-icon">

  </head>
  <body>
    <?php require 'partials/header.php' ?>
    <?php if(!empty($user)): ?>
      <h1>Inicio de sesion exitoso<br>
      <br> Bienvenido: <?= $user['email']; ?><br>
      <a href="pf.html">Ir a tienda</a></h1><br><br><br><br>
    <?php else: ?>
      <br><br>
      <h1>Por favor, inicie sesión o registrese</h1>

      <a href="login.php">Iniciar sesión</a> o
      <a href="signup.php">Registrarse</a>
      <br><br><br>
    <?php endif; ?>
    <?php require 'partials/footer.php' ?>
  </body>
</html>
