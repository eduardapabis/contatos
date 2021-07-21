<html>
<head>
	<title>Site de Contatos</title>
	<link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
	<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>
<center>
<h1>ADICIONAR</h1>
<form method="POST" action="adicionarUsuario_submit.php">
	Email: <br>
	<input type="email" name="email"><br><br>

  Senha: <br>
  <input type="password" name="senha"><br><br>
  
	 <button type="submit" class="btn btn-crud btn-adicionarEEditar">Adicionar</button>
    <button type="button" class="btn close"><a href="index.php">Voltar</a></button>
</form>
</center>
</body>
</html>