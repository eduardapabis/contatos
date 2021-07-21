<?php
session_start();
require 'config.php';
require 'usuarios.class.php';

if (!empty($_POST['email'])) {
  $email = addslashes($_POST['email']);
  $senha = md5($_POST['senha']);
  $usuarios = new Usuarios($pdo);
  if ($usuarios->fazerLogin($email, $senha)) {
    header("Location: index.php");
    exit;
  }else {
    echo "<center>Usuário e/ou senha estão errados!</center>";
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
  </head>
  <body>
    <div class="login">
      <h1>LOGIN</h1>
      <form method="POST">
        Email:<br>
        <input type="email" name="email"><br><br>
        Senha:<br>
        <input type="password" name="senha"><br><br>
        <button type="submit" class="btn entrar">Entrar</button>
         <button type="submit" class="btn btn-crud"><a href="adicionarUsuarios.php">Registre-se</a></button>
      </form>
    </div>
  </body>
</html>
