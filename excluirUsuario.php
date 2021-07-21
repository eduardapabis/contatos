<?php
include 'config.php';
include 'usuarios.class.php';

$usuarios = new Usuarios($pdo);

  if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $usuarios->excluir($id);
    header("Location: /xampp/projeto_contato/login.php");
  }else {
    echo '<script type="text/javascript">alert("Erro ao excluir");</script>';
  }
?>
