<?php



namespace App\Controllers\Admin;

use App\Helpers\Sessao;
use App\Helpers\Url;
use App\Helpers\Valida;
use App\Libraries\Controller;

class Usuarios extends Controller
{
  private $Data;
  public function __construct()
  {
    $this->Data = $this->model("admin\Auth");
    if (Sessao::nivel1()) {
      session_destroy();
      Url::redireciona("home");
    } elseif (!Sessao::nivel0()) {
      Url::redireciona("admin/login");
    }
  }
  public function index()
  {
    $users = $this->Data->getUsers();

    $file = 'admin/usuarios';
    $title = 'users';
    return $this->view('layouts/admin/app', compact('file', 'title', 'users'));
  }
  public function create()
  {
    $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (in_array("", $form)) {
      Sessao::notify("error", "Preencha todos os campos", "error");
      Url::redireciona('admin/usuarios');
    } else {
      if (Valida::email($form['email'])) {
        Sessao::notify("error", "Preencha o email corretamente", "error");
        Url::redireciona('admin/usuarios');
      } elseif ($this->Data->checaemail($form['email'])) {
        Sessao::notify("error", "Email já cadastrado", "error");
        Url::redireciona('admin/usuarios');
      } else {

        $dados = ['nome' => trim($form['nome']), 'email' => trim($form['email']), 'senha' => trim($form['senha']), 'nivel' => trim($form['nivel'])];
        $dados['senha'] = Valida::pass_segura($dados['senha']);
        $cad = $this->Data->createUser($dados);
        if ($cad) {
          Sessao::notify("success", "Cadastrado com sucesso");
          Url::redireciona("admin/usuarios");
          exit;
        } else {
          Sessao::notify("error", "Erro no BD", "error");
          Url::redireciona("admin/usuarios");
          exit;
        }
      }
    }
  }
  public function edit($id)
  {
    $id = filter_var($id['id'], FILTER_VALIDATE_INT);
    $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (in_array("", $form)) {
      Sessao::notify("error", "Preencha todos os campos", "error");
      Url::redireciona('admin/usuarios');
    } else {
      if (Valida::email($form['email'])) {
        Sessao::notify("error", "Preencha o email corretamente", "error");
        Url::redireciona('admin/usuarios');
      } else {

        $dados = ['nome' => trim($form['nome']), 'email' => trim($form['email']), 'nivel' => trim($form['nivel'])];

        $update = $this->Data->updateUser($dados, $id);
        if ($update) {
          Sessao::notify("success", "Atualizado com sucesso");
          Url::redireciona("admin/usuarios");
          exit;
        } else {
          Sessao::notify("error", "Erro no BD", "error");
          Url::redireciona("admin/usuarios");
          exit;
        }
      }
    }
  }
  public function delete($id)
  {
   
    
    $nivel = filter_var($id['nivel'], FILTER_VALIDATE_INT);
    $id = filter_var($id['id'], FILTER_VALIDATE_INT);
    if ($nivel == '0') {
      Sessao::notify('error', 'Não pode deletar admin', "error", null, null);
      Url::redireciona("admin/usuarios");
      exit;
    } else {
      
      $delete = $this->Data->deleteUser($id);
        if ($delete) {
          Sessao::notify('success', 'Conta deletada', null, null, null);
          Url::redireciona("admin/usuarios");
          exit;
        } else {
          Sessao::notify('error', 'Conta não deletada', "error", null, null);
          Url::redireciona("admin/usuarios");
          exit;
        }
    }
  }
}
