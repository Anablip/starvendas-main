<?php

use Application\core\Controller;

class Carrinho extends Controller
{
  public function index()
  {
    $Enderecos = $this->model('Enderecos');
    $listarEnd = $Enderecos::listarTudo();

    $Usuarios = $this->model('Usuarios');
    $listarUser = $Usuarios::listarTudo();
    
    $Carrinhos = $this->model('Carrinhos');
    $listarCar = $Carrinhos::listarTudo();


    $this->view('carrinho/index', [
      'enderecos' => $listarEnd,
      'usuarios' => $listarUser, 
      'carrinhos' => $listarCar

    ]);
  }
  public function salvar()
  {
    $usuario = $_POST['txt_usuario'];
    $endereco = $_POST['txt_endereco'];

    $Carrinhos = $this->model('Carrinhos');
    $Carrinhos::salvar($usuario, $endereco);

    $this->redirect('carrinho/index');
  }
   public function editar()
  {
    $id = $_POST['txt_id'];
    $usuario = $_POST['txt_usuario'];
    $endereco = $_POST['txt_endereco'];
    $Carrinhos = $this->model('Carrinhos');

    //var_dump($_POST);
    //exit;

    $Carrinhos::editar($id, $usuario, $endereco);
    $this->redirect('carrinho/index');
  }
  public function excluir($id)
  {
    $Carrinhos = $this->model('Carrinhos');
    $Carrinhos::excluir($id);
    $this->redirect('carrinho/index');
  }
}
