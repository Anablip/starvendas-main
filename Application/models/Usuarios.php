<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Usuarios
{
  public static function salvar($nome, $email, $senha, $foto)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
        'INSERT INTO tb_usuarios (nome, email, senha, foto) 
         VALUES (:NOME, :EMAIL, :SENHA, :FOTO)',
        array(
          ':NOME' => $nome,
          ':EMAIL' => $email,
          ':SENHA' => $senha,
          ':FOTO' => $foto
          )
    );
    return $result->rowCount();
  }
  public static function salvar_alteracao($id, $nome, $email, $senha, $foto)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
        'UPDATE tb_usuarios SET nome = :NOME, email = :EMAIL, senha = :SENHA, foto = :FOTO WHERE id = :ID',
        array(
          ':NOME' => $nome,
          ':EMAIL' => $email,
          ':SENHA' => $senha,
          ':FOTO' => $foto,
          ':ID' => $id
        )
    );
    return $result->rowCount();
  }

  public static function excluir($id)
  {
    $conn = new Database();
    $result = $conn->executeQuery(
        'DELETE FROM tb_usuarios WHERE id=:ID',
        array(':ID' => $id)
    );
    return $result->rowCount();
  }
  public static function listarTudo()
  {
      $conn = new Database();
      $result = $conn->executeQuery('
      SELECT * FROM tb_usuarios');
      return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function listarPerfil($id)
  {
      $conn = new Database();
      $result = $conn->executeQuery('
      SELECT * FROM tb_usuarios WHERE id=:ID', array(':ID' => $id));
      return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function buscarPorEmail($email)
  {
      $conn = new Database();
      $result = $conn->executeQuery(
          'SELECT id, nome, email, senha, foto FROM tb_usuarios WHERE email = :EMAIL',
          array(
              ':EMAIL' => $email
          )
      );
      return $result->fetch(PDO::FETCH_OBJ);
  }  
  public static function editar($id, $nome, $foto, $senhahas, $imagem)
  {
      // 1. Inicia a query SQL e o array de parâmetros
      $sql = 'UPDATE tb_usuarios SET nome = :NOME, foto = :FOTO, senha = :SENHA WHERE id = :ID';
      $params = [
          ':NOME' => $nome,
          ':FOTO' => $foto,
          ':SENHA' => $senhahas,
          ':ID' => $id
      ];

      // 2. Adiciona a atualização de imagem à query se uma nova imagem foi fornecida
      if ($imagem !== null) {
          $sql .= ', imagem = :IMAGEM';
          $params[':IMAGEM'] = $imagem;
      }

      // 3. Finaliza a query com a cláusula WHERE
      $sql .= ' WHERE id = :ID';
      $params[':ID'] = $id;

      // 4. Executa a query
      $conn = new Database();
      $result = $conn->executeQuery($sql, $params);
      
      return $result->rowCount();
  }
}
