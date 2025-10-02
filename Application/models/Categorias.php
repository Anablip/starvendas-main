<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Categorias
{
  public static function salvar($nome)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
        'INSERT INTO tb_categorias (nome) VALUES (:NOME)',
        array(':NOME' => $nome)
    );
    return $result->rowCount();
  }
  public static function editar($id, $nome)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
        'UPDATE tb_categorias
        SET nome = :NOME
        WHERE id = :ID',
        array(
          ':NOME' => $nome,
          ':ID' => $id
        )
    );
    return $result->rowCount();
  }
  public static function excluir($id)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
        'DELETE FROM tb_categorias WHERE id=:ID',
        array(':ID' => $id)
    );
    return $result->rowCount();
  }
  public static function listarTudo()
  {
      $conn = new Database();
      $result = $conn->executeQuery('
      SELECT * FROM tb_categorias');
      return $result->fetchAll(PDO::FETCH_ASSOC);
  }

}
