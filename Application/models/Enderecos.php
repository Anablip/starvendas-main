<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Enderecos
{
  public static function salvar($usuario, $nome, $cep, $rua, $numero)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
        'INSERT INTO tb_enderecos 
        (id_usuario, nome, cep, rua, numero) 
        VALUES (:USUARIO, :NOME, :CEP, :RUA, :NUMERO)',
        array(
          ':USUARIO' => $usuario,
          ':NOME' => $nome,
          ':CEP' => $cep,
          ':RUA' => $rua,
          ':NUMERO' => $numero
          )                                                           
    );
    return $result->rowCount();
  }
  public static function excluir($id)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
        'DELETE FROM tb_enderecos WHERE id=:ID',
        array(':ID' => $id)
    );
    return $result->rowCount();
  }
  public static function listarTudo()
  {
      $conn = new Database();
      $result = $conn->executeQuery('SELECT
      *
      FROM tb_enderecos      
      ');
      return $result->fetchAll(PDO::FETCH_ASSOC);
  }

}
