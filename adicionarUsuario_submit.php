<?php
  include 'config.php';
  include 'usuarios.class.php';

  $usuarios = new Usuarios($pdo);
  if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuarios->adicionar($email, $senha);

    header("Location: /xampp/projeto_contato/");
  }
?>
