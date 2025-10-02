<?php

use Application\core\Controller;

class Usuario extends Controller
{
  public function index()
  {
    $Usuarios = $this->model('Usuarios');
    $data = $Usuarios::listarTudo();
    $this->view('usuario/index', ['usuarios' => $data]);
  }
  public function salvar()
  {
    $nome = $_POST['txt_nome'];
    $email = $_POST['txt_email'];
    $senha = $_POST['txt_senha'];
    $foto = $_FILES['txt_foto'];

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $timestamp = date('YmdHis');
    $fotoName = $timestamp . '.jpg';
    $uploadPath = '../public/uploads/foto/' . $fotoName;
     if (move_uploaded_file($foto['tmp_name'], $uploadPath)) {
      $usuarios = $this->model('Usuarios');
      $usuarios::salvar($nome, $email, $senhaHash, $fotoName);
      $this->redirect('usuario/index');
    }
  }

  public function salvar_cadastrar()
  {
    $nome = $_POST['txt_nome'];
    $email = $_POST['txt_email'];
    $senha = $_POST['txt_senha'];
    $foto = $_FILES['txt_foto'];

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $timestamp = date('YmdHis');
    $fotoName = $timestamp . '.jpg';
    $uploadPath = '../public/uploads/foto/' . $fotoName;
     if (move_uploaded_file($foto['tmp_name'], $uploadPath)) {
      $usuarios = $this->model('Usuarios');
      $usuarios::salvar($nome, $email, $senhaHash, $fotoName);
      $this->redirect('usuario/entrar');
    }
  }
    public function cadastro()
    {
      $this->view('usuario/cadastro');
    }
    public function perfil($id)
    {
      $Usuarios = $this->model('Usuarios');
      $data = $Usuarios::listarPerfil($id);
      //print_r($data); exit();
      $this->view('usuario/perfil', ['usuario' => $data]);
    }
  public function excluir($id)
  {
    $Usuarios = $this->model('Usuarios');
    $Usuarios::excluir($id);
    $this->redirect('usuario/index');
  }
  public function entrar()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['txt_email'];
        $senha = $_POST['txt_senha'];

        $Usuarios = $this->model('Usuarios');
        $usuario = $Usuarios::buscarPorEmail($email);

        if ($usuario && password_verify($senha, $usuario->senha)) {
            session_start();
            $_SESSION['usuario_logado'] = $usuario;
            $this->redirect('/home');
        } else {
            $this->view('usuario/entrar', ['erro' => 'Email ou senha inválidos.']);
        }
    } else {
        $this->view('usuario/entrar');
    }
} 
public function cadastros()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nome = $_POST['txt_nome'];
      $email = $_POST['txt_email'];
      $senha = $_POST['txt_senha'];
      $foto = $_POST['txt_foto'] ?? null;

      $Usuarios = $this->model('Usuarios');
      $Usuarios::salvar($nome, $email, $senha, $foto);

      $this->redirect('usuario/entar');
      return;
    }
    $this->view('usuario/cadastros');
  }

    public function sair()
  {
      session_start();
      session_unset();
      session_destroy();
      $this->redirect('/home');
  }
  public function editar_1()
  {
      $id = $_POST['txt_id'];
      $nome = $_POST['txt_nome'];
      $email = $_POST['txt_email'];
      $senha = $_POST['txt_senha'];

      // 1. Verificação da foto
      if (isset($_FILES['txt_foto']) && $_FILES['txt_foto']['error'] === UPLOAD_ERR_OK) {
          $foto = $_FILES['txt_foto'];
          $fotoOk = true;
          
          // 1.1. Processamento e upload da foto (Apenas se fotoOk for true)
          $timestamp = date('YmdHis');
          $fotoName = $timestamp . '.jpg';
          $uploadPath = '../public/uploads/foto/' . $fotoName;
          move_uploaded_file($foto['tmp_name'], $uploadPath);
      } else {
          $fotoOk = false;
          $fotoName = null; // Garante que a variável exista, mas com valor nulo
      }

      // 2. Processamento da senha (Apenas se o campo não estiver vazio)
      $senhaHash = !empty($senha) ? password_hash($senha, PASSWORD_DEFAULT) : null;

      // 3. Chamada ÚNICA ao Model
      $Usuarios = $this->model('Usuarios');
      // Passamos todos os dados. A lógica de qual SQL rodar fica no Model.
      $Usuarios::editar($id, $fotoName, $nome, $email, $senhaHash); 

      // 4. Atualização da sessão (Considerando que a fotoName só é definida se uma nova for enviada)
      if ($fotoName !== null) {
          $_SESSION['usuario_logado']->foto = $fotoName;
      }
      $_SESSION['usuario_logado']->nome = $nome;
      $_SESSION['usuario_logado']->email = $email;

      $this->redirect('usuario/index/' . $id . '?msg=Perfil atualizado com sucesso.');
  }
  public function editar()
  {
      $id = $_POST['txt_id'];
      $nome = $_POST['txt_nome'];
      $email = $_POST['txt_email'];
      $senha = $_POST['txt_senha'];

      // 1. Verificação da foto
      if (isset($_FILES['txt_foto']) && $_FILES['txt_foto']['error'] === UPLOAD_ERR_OK) {
          $foto = $_FILES['txt_foto'];
          $fotoOk = true;
          
          $timestamp = date('YmdHis');
          $fotoName = $timestamp . '.jpg';
          $uploadPath = '../public/uploads/foto/' . $fotoName;
          move_uploaded_file($foto['tmp_name'], $uploadPath);
      } else {
          $fotoOk = false;
          $fotoName = null;
      }

      $senhaHash = !empty($senha) ? password_hash($senha, PASSWORD_DEFAULT) : null;
      
      $Usuarios = $this->model('Usuarios');
      $Usuarios::editar($id, $nome, $fotoName, $email, $senhaHash);

      // 4. Atualização da sessão (Considerando que a fotoName só é definida se uma nova for enviada)
      if ($fotoName !== null) {
          $_SESSION['usuario_logado']->foto = $fotoName;
      }
      $_SESSION['usuario_logado']->nome = $nome;
      $_SESSION['usuario_logado']->email = $email;

      $this->redirect('usuario/perfil/' . $id . '?msg=Perfil atualizado com sucesso.');
  }
  
}
