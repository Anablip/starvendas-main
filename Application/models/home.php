<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class home
{
  public static function salvar($email, $senha)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
        'INSERT INTO tb_home (email, senha) 
         VALUES (:EMAIL, :SENHA)',
        array(
          ':EMAIL' => $email,
          ':SENHA' => $senha
          )
    );
    return $result->rowCount();
  }
  public static function excluir($id)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
        'DELETE FROM tb_home WHERE id=:ID',
        array(':ID' => $id)
    );
    return $result->rowCount();
  }
  public static function listarTudo()
  {
      $conn = new Database();
      $result = $conn->executeQuery('
      SELECT * FROM tb_home');
      return $result->fetchAll(PDO::FETCH_ASSOC);
  }

}
