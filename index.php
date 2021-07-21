<?php
session_start();
include 'config.php';
include 'usuarios.class.php';
include 'contatos.class.php';

$usuarios = new Usuarios($pdo);
$usuarios->setUsuario($_SESSION['logado']);

$contatos = new Contato($pdo);

if (!isset($_SESSION['logado'])) {
	header("Location: login.php");
}

?>
<html>
<head>
	<title>Site de Contatos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>
<header>
    <ul>
			<li><a href="#">Conta <i class="fas fa-caret-down"></i></a>
				<ul>
					<li><a href="editarUsuario.php?id=<?php echo $_SESSION['logado']; ?>">Editar</a></li>
                    <li><a href="logout.php">Sair</a></li>                    
				</ul>
			</li>
    </ul>
</header>

<div class="container">
    <center>
    <button class="btn btn-adicionar"><a href="adicionar.php" class="modal_ajax">ADICIONAR</a></button><br><br>

    <table border="1" width="600px">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php
            $lista = $contatos->getAll();
            foreach ($lista as $item) :
        ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['nome']; ?></td>
            <td><?php echo $item['email']; ?></td>
            <td>
                <button class="btn btn-editar"><a href="editar.php?id=<?php echo $item['id']; ?>" class="modal_ajax">EDITAR</a></button>
                <button class="btn btn-excluir"><a href="excluir.php?id=<?php echo $item['id']; ?>">EXCLUIR</a></button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</center>
    <!-- Criar o modal -->
    <div class="modal_bg">
        <div class="modal">

        </div>
    </div>
    
</div>
</body>
</html>
