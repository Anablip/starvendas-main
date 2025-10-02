<?php

use Application\core\Controller;

class Endereco extends Controller
{
  public function index()
  {
    $Enderecos = $this->model('Enderecos');
    $listarEnd = $Enderecos::listarTudo();

    $Usuarios = $this->model('Usuarios');
    $listarUser = $Usuarios::listarTudo();


    $this->view('endereco/index', [
      'enderecos' => $listarEnd,
      'usuarios' => $listarUser

    ]);
  }
  public function salvar()
  {
    $usuario = $_POST['txt_usuario'];
    $nome = $_POST['txt_nome'];
    $cep = $_POST['txt_cep'];
    $rua = $_POST['txt_rua'];
    $numero = $_POST['txt_numero'];   

    $Enderecos = $this->model('Enderecos');
    $Enderecos::salvar($usuario, $nome, $cep, $rua, $numero);
    $this->redirect('endereco/index');
  }
  public function excluir($id)
  {
    $Enderecos = $this->model('Enderecos');
    $Enderecos::excluir($id);
    $this->redirect('endereco/index');
  }
}
