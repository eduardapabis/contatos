<?php
  try {
    $pdo = new PDO("mysql:dbname=projeto_contato;host=localhost", "root", "");
  } catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    exit;
  }

?>
