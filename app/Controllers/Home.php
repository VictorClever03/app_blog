<?php

namespace App\Controllers;

use App\Helpers\Sessao;
use App\Helpers\Url;
use App\Helpers\Valida;
use App\Libraries\Controller;

class  Home  extends Controller
{
  private $Data;
  public function __construct()
  {

    $this->Data = $this->model("user\Usuarios");
  }
  public function index()
  {
    $file = 'homepage';
    $title = 'home';
    return $this->view('layouts/user/app', compact('file', 'title'));
  }
  public function about()
  {
    $file = 'about';
    $title = 'about';
    return $this->view('layouts/user/app', compact('file', 'title'));
  }
  public function cursos()
  {
    $file = 'cursos';
    $title = 'cursos';
    return $this->view('layouts/user/app', compact('file', 'title'));
  }
  public function blog()
  {
    if (!Sessao::nivel1()) :
      Url::redireciona('home');
    endif;
    $file = 'blog';
    $title = 'blog';
    return $this->view('layouts/user/app', compact('file', 'title'));
  }

  public function team()
  {
    $file = 'team';
    $title = 'team';
    return $this->view('layouts/user/app', compact('file', 'title'));
  }
  public function contact()
  {
    $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    // var_dump($form);
    if (isset($form['send'])) {
      $dados = ['nome' => trim($form['name']), 'email' => trim($form['email']), 'assunto' => trim($form['subject']), 'mensagem' => trim($form['message']), 'error' => ''];

      if (in_array("", $form)) {
        if (empty($form['name']) || empty($form['email']) || empty($form['subject']) || empty($form['message'])) {
          $dados['error'] = "Preencha todos os campos";
        }
      }else {
        if(Valida::email($dados['email'])){
          $dados['error'] = "Preencha corretamente o email";
        }else{

          $salvar = $this->Data->storeMessage($dados);
          if ($salvar) {
            Sessao::notify('message', 'Mensagem enviada', null, null, "('#contactForm')");
            
          }else{
            Sessao::notify('message', 'Mensagem não enviada', "error", null, "('#contactForm')");

          }
        }
      }
    } else {
      $dados = ['nome' => '', 'email' => '', 'assunto' => '', 'mensagem' => '', 'error' => ''];
    }
    $file = 'contact';
    $title = 'contact';
    return $this->view('layouts/user/app', compact('file', 'title','dados'));
  }

  public function create()
  {
    if (Sessao::nivel1() || Sessao::nivel0()) :
      session_destroy();
      Url::redireciona("createUser");
    endif;
    $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (isset($form['create'])) {

      $dados = ['nome' => trim($form['nome']), 'email' => trim($form['email']), 'senha' => trim($form['senha']), 'error' => ''];

      if (in_array("", $form)) {

        if (empty($form['nome']) || empty($form['email']) || empty($form['senha'])) {
          Sessao::sms("valid", "Todos os campos são obrigatórios", "alert alert-danger");
          $dados['error'] = "Por favor preencha todos os campos!";
        }
      } else {
        // var_dump($dados);
        if (Valida::email($dados['email'])) {
          Sessao::sms("valid", "Email invalido", "alert alert-danger");
          $dados['error'] = "Preecnha correctamente o email";
        } elseif (Valida::length_senha($dados['senha'])) {
          Sessao::sms("valid", "Mínimo de caracteres 8", "alert alert-danger");
          $dados['error'] = "Preencha preencha a senha";
        } elseif ($this->Data->checaEmail($dados['email'])) {
          Sessao::sms("valid", "Email já existente no sistema", "alert alert-danger");
          $dados['error'] = "Não podem existir duas contas com mesmo email";
        } else {
          $dados['senha'] = Valida::pass_segura($dados['senha']);
          $create = $this->Data->storeUser($dados);
          if ($create) {
            Url::redireciona("login");
            Sessao::notify('auth', 'Conta criada', null, null, null);
            exit;
          }
        }
      }
    } else {
      $dados = ['nome' => '', 'email' => '', 'senha' => '', 'error' => ''];
    }

    $title = 'create';
    return $this->view('create', compact('title', 'dados'));
  }
}
