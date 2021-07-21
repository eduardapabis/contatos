<?php
class Usuarios {
  private $pdo;
  private $id;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  public function fazerLogin($email, $senha) {
    $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
    $sql = $this->pdo->prepare($sql);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":senha", $senha);
    $sql->execute();
    if($sql->rowCount() > 0) {
      $sql = $sql->fetch();
      $_SESSION['logado'] = $sql['id'];
      return true;
    }
    return false;
  }

  public function setUsuario($id) {
    $this->id = $id;
    $sql = "SELECT * FROM usuarios WHERE id = :id";
    $sql = $this->pdo->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();
    if($sql->rowCount() > 0) {
      $sql = $sql->fetch();
      return true;
    }
  }

  public function adicionar($email, $senha) {
    $emailexistente = $this->existeEmail($email);

    if (count($emailexistente) == 0) {
      $sql = "INSERT INTO usuarios VALUES(DEFAULT, :email, :senha)";
      $sql = $this->pdo->prepare($sql);
      $sql->bindValue(":email", $email);
      $sql->bindValue(":senha", md5($senha));
      $sql->execute();
      return TRUE;
    }else {
      return FALSE;
    }
  }

  public function existeEmail($email) {
    $sql = "SELECT id FROM usuarios WHERE email = :email";
    $sql = $this->pdo->prepare($sql);
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() > 0) {
      $array = $sql->fetch();
    }else {
      $array = array();
    }
    return $array;
  }

  public function getAll() {
    $sql = "SELECT * FROM usuarios";
    $sql = $this->pdo->query($sql);

    if ($sql->rowCount() > 0) {
      return $sql->fetchAll();
    }else {
      return array();
    }
  }

  public function getInfo($id) {
      $sql = "SELECT * FROM usuarios WHERE id = :id";
      $sql =  $this->pdo->prepare($sql);
      $sql->bindValue(':id', $id);
      $sql->execute();

      if($sql->rowCount() > 0){
        return $sql->fetch();
      }else{
        return array();
      }
  }

  public function editar($email, $id) {
    $emailexistente = $this->existeEmail($email);
    if (count($emailexistente) > 0 && $emailexistente['id'] != $id) {
      return FALSE;
    }else {
      $sql = "UPDATE usuarios SET email = :email WHERE id = :id ";
      $sql = $this->pdo->prepare($sql);
      $sql->bindValue(":email", $email);
      $sql->bindValue(":id", $id);
      $sql->execute();
      return TRUE;
    }
  }  
}
?>
