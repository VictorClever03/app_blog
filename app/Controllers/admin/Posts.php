<?php

namespace App\Controllers\admin;

use App\Helpers\Sessao;
use App\Helpers\Url;
use App\Libraries\Controller;
use App\Libraries\uploads;

class Posts extends Controller
{
  private $News;
  private $Cat;
  public function __construct()
  {
    $this->News = $this->model("admin\Posts");
    $this->Cat = $this->model("admin\Categoria");
    if (Sessao::nivel1()) {
      session_destroy();
      Url::redireciona("home");
    } elseif (!Sessao::nivel0()) {
      Url::redireciona("admin/login");
    }
  }
  public function index()
  {
    $dados = $this->News->getPosts();
    $file = 'admin/posts/listar';
    $title = 'posts';
    return $this->view('layouts/admin/app', compact('file', 'title', 'dados'));
  }
  public function create()
  {
    $category = $this->Cat->read_c();


    $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if ($form['not']) {
      $dados = [
        'title' => trim($form['title']),
        'desc' => trim($form['desc']),
        'cat' => trim($form['cat']),
        'img' => trim($form['img']),
        'error' => ''
      ];

      if (in_array("", $form)) {
        if (empty($dados['title']) || empty($dados['desc']) || empty($dados['img']) || empty($dados['cat'])) {
          $dados['error'] = "Preencha todos os campos";
          Sessao::sms("noticia", "Alerta: *Não deixe nunhum campo vazio", "alert alert-info");
        }
      } else {

        if ($_FILES['img']) {
          $catName = $this->Cat->read1_c($dados['cat']);
          $path = 'Posts' . DIRECTORY_SEPARATOR . $catName['nome'];
          $uploads = new uploads();
          $uploads->imagem($_FILES['img'], 7, $path);
        }
        if ($uploads->getexito()) {
          $dados['img'] = !empty($_SESSION['path']) ? $_SESSION['path'] : 'img\not-found.svg';
          $save = $this->News->store($dados);
          if ($save) {
            unset($_SESSION['path']);
            Sessao::notify("success", "Post criado com sucesso");
            Url::redireciona("admin/posts");
            exit;
          } else {
            Sessao::notify("error", "Post nao criado", "error");
            // Url::redireciona("admin/posts");
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
        'title' => '',
        'desc' => '',
        'cat' => '',
        'img' => '',
        'error' => ''
      ];
    }
    $file = 'admin/posts/posts';
    $title = 'novo post';
    return $this->view('layouts/admin/app', compact('file', 'title', 'dados', 'category'));
  }
  public function edit($id)
  {


    $id=filter_var($id['id'], FILTER_VALIDATE_INT);
    $post = $this->News->getOne($id);
    $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
    if ($form['btn']) {
      $dados = [
        'title' => trim($form['title']),
        'desc' => trim($form['desc']),
        'error' => ''
      ];

      if (in_array("", $form)) {
        if (empty($dados['title']) || empty($dados['desc']) ) {
          $dados['error'] = "Preencha todos os campos";
          Sessao::notify("error", "Alerta: *Não deixe nunhum campo vazio", "error");
        }
      } else {
          $save = $this->News->update($dados,$id);
          if ($save) {
            Sessao::notify("success", "Post atualizado com sucesso");
            Url::redireciona("admin/posts");
            exit;
          } else {
            Sessao::notify("error", "Post nao atualizado", "error");
          }
      }
    } else {
      $dados = [
        'title' => '',
        'desc' => '',
        'error' => ''
      ];
    }
    $file = 'admin/posts/edit';
    $title = 'post';
    return $this->view('layouts/admin/app', compact('file', 'title', 'dados', 'post'));
  }

  public function delete($id)
  {
    $id=filter_var($id['id'], FILTER_VALIDATE_INT);
    $delete =$this->News->delete($id);
    if($delete){
      Sessao::notify('success', 'Post deletada', null, null, null);
      Url::redireciona("admin/posts");
      exit;
    }else{
      Sessao::notify('error', 'Post não deletada', "error", null, null);
      Url::redireciona("admin/posts");
      exit;
    }
  }
}
