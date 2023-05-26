<?php



namespace App\Controllers\Admin;

use App\Helpers\Sessao;
use App\Helpers\Url;
use App\Libraries\Controller;

class Categoria extends Controller
{
  private $Data;
  public function __construct()
  {
    $this->Data = $this->model("admin\Categoria");
    if (Sessao::nivel1()) {
      session_destroy();
      Url::redireciona("home");
    } elseif (!Sessao::nivel0()) {
      Url::redireciona("admin/login");
    }
  }
  public function index()
  {
    $listar=$this->Data->read_c();
   
    $file = 'admin/categorias';
    $title = 'categorias';
    return $this->view('layouts/admin/app', compact('file', 'title', 'listar'));
  }
  public function cadastrar()
  {
    $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (in_array("", $form)) {
      Sessao::notify("error", "Preencha todos os campos", "error");
      Url::redireciona('admin/categorias');
    } else {
      if ($this->Data->checa_nome($form['nome'])) {
        Sessao::notify("error", "categoria já cadastrada", "error");
        Url::redireciona('admin/categorias');
      } else {

        $dados = ['nome' => trim($form['nome']), 'desc' => trim($form['desc'])];
        $cad = $this->Data->store_c($dados);
        if ($cad) {
          Sessao::notify("success", "Cadastrado com sucesso");
          Url::redireciona("admin/categorias");
          exit;
        }
      }
    }
    
  }
  public function delete($id)
  {
    $id=filter_var($id['id'], FILTER_VALIDATE_INT);
    $delete =$this->Data->delete_c($id);
    if($delete){
      Sessao::notify('success', 'Categoria deletada', null, null, null);
      Url::redireciona("admin/categorias");
    }else{
      Sessao::notify('error', 'Categoria não deletada', "error", null, null);
      Url::redireciona("admin/categorias");
    }
  }
  public function edit($id)
  {
    $id=filter_var($id['id'], FILTER_VALIDATE_INT);
    $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (in_array("", $form)) {
      Sessao::notify("error", "Preencha todos os campos", "error");
      Url::redireciona('admin/categorias');
    } else {
        $dados = ['nome' => trim($form['nome']), 'desc' => trim($form['desc'])];
        $cad = $this->Data->update_c($dados,$id);
        if ($cad) {
          Sessao::notify("success", "Atualizado com sucesso");
          Url::redireciona("admin/categorias");
          exit;
        }

    }
  }
}
