<?php



namespace App\Controllers\Admin;

use App\Helpers\Sessao;
use App\Helpers\Url;
use App\Libraries\Controller;
use App\Libraries\uploads;

class Honra extends Controller
{
  private $Data;
  public function __construct()
  {
    $this->Data = $this->model("admin\Honra");
    if (Sessao::nivel1()) {
      session_destroy();
      Url::redireciona("home");
    } elseif (!Sessao::nivel0()) {
      Url::redireciona("admin/login");
    }
  }   
  public function index()  
  {
    $dados=$this->Data->honrados();
    $file = 'admin/honra/listar';
    $title = 'honra';
    return $this->view('layouts/admin/app', compact('file', 'title', 'dados'));
  }
  public function create() 
  {
    $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if ($form['not']) {
      $dados = [
        'nome' => trim($form['nome']),
        'desc' => trim($form['desc']),
        'media' => trim($form['media']),
        'img' => trim($form['img']),
        'error' => ''
      ];

      if (in_array("", $form)) {
        if (empty($dados['nome']) || empty($dados['desc']) || empty($dados['img']) || empty($dados['media'])) {
          $dados['error'] = "Preencha todos os campos";
          Sessao::sms("noticia", "Alerta: *Não deixe nunhum campo vazio", "alert alert-info");
        }
      } else {

        if ($_FILES['img']) {
          $path = 'Quadro Honra';
          $uploads = new uploads();
          $uploads->imagem($_FILES['img'], 7, $path);
        }
        if ($uploads->getexito()) {
          $dados['img'] = !empty($_SESSION['path']) ? $_SESSION['path'] : 'img\not-found.svg';
          $save = $this->Data->create($dados);
          if ($save) {
            unset($_SESSION['path']);
            Sessao::notify("success", "Cadastrado com sucesso");
            Url::redireciona("admin/honrados");
            exit;
          } else {
            Sessao::notify("error", "Erro", "error");
            Url::redireciona("admin/honrados");
          }
        } else {
          if ($uploads->geterro()) {

            Sessao::sms("noticia", $uploads->geterro(), "alert alert-danger");
          }
          Sessao::sms("noticia", "Erro", "alert alert-danger");
        }
      }
    } else {
      $dados = [
        'nome' => '',
        'desc' => '',
        'media' => '',
        'img' => '',
        'error' => ''
      ];
    }

    $file = 'admin'.DIRECTORY_SEPARATOR.'honra'.DIRECTORY_SEPARATOR.'honra';
    $title = 'honraN';
    return $this->view('layouts/admin/app', compact('file', 'title','dados'));
  }
  public function edit($id)
  {
    $id=filter_var($id['id'], FILTER_VALIDATE_INT);
    $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
  

      if (in_array("", $form)) {
          $dados['error'] = "Preencha todos os campos";
          Sessao::notify("error", "Alerta: *Não deixe nunhum campo vazio", "error");
        
      } else {
        $dados=['nome'=>trim($form['nome']), 'media'=>trim($form['media']), 'desc'=>trim($form['desc'])];
          $save = $this->Data->update($dados);
          if ($save) {
            Sessao::notify("success", "Atualizado com sucesso");
            Url::redireciona("admin/honrados");
            exit;
          } else {
            Sessao::notify("error", "Não atualizado", "error");
            Url::redireciona("admin/honrados");
          }
      }
   
  }
  public function delete($id) {
    $id=filter_var($id['id'], FILTER_VALIDATE_INT);
    $delete =$this->Data->delete($id);
    if($delete){
      Sessao::notify('success', 'Deletado com sucesso', null, null, null);
      Url::redireciona("admin/honrados");
      exit;
    }else{
      Sessao::notify('error', 'Post não deletada', "error", null, null);
      Url::redireciona("admin/honrados");
      exit;
    }
  }
  
}
