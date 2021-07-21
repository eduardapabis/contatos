<?php
include 'config.php';
include 'usuarios.class.php';

$usuarios = new Usuarios($pdo);

if (!empty($_GET['id'])) {
	$id = $_GET['id'];
	$info = $usuarios->getInfo($id);
	if (empty($info['email'])) {
		header("Location: /xampp/projeto_contato/index.php");
		exit;
	}
}else {
	header("Location: /xampp/projeto_contato/index.php");
	exit;
}
?>
<center>
<html>
<head>
	<title>Site de Contatos</title>
	<link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
	<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>
<center>
<h1>EDITAR</h1>

<form method="POST" action="editarUsuario_submit.php">

	<input type="hidden" name="id" value="<?php echo $info['id']; ?>">

	Email: <br>
	<input type="email" name="email" value="<?php echo $info['email']; ?>"><br><br>

	 <button type="submit" class="btn btn-crud btn-adicionarEEditar">Editar</button>
    <button type="button" class="btn close"><a href="index.php">Voltar</a></button>
</form>
</center>
</body>
</html>