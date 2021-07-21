<?php

include 'config.php';
include 'usuarios.class.php';

$usuarios = new Usuarios($pdo);
if (!empty($_POST['id'])) {
  $email = $_POST['email'];
  $id = $_POST['id'];
  if (!empty($email)) {
		$usuarios->editar($email, $id);
	}
	header("Location: /xampp/projeto_contato/");
}

?>
