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
    $file = 'contact';
    $title = 'contact';
    return $this->view('layouts/user/app', compact('file', 'title'));
  }
  // Autenticacao do usuario
  public function login()
  {
    if (Sessao::nivel1()) :
      Url::redireciona('home');
    endif;
          // var_dump($_SESSION);

    $formulario = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    // var_dump($formulario);
    if (isset($formulario['login'])) :
      $dados = [
        'email' => trim($formulario['email']),
        'senha' => trim($formulario['senha']),
        'erro_email' => '',
        'erro_senha' => ''
      ];

      if (in_array("", $formulario)) :

        if (empty($formulario['email'])) :
          $dados['erro_email'] = "preencha o campo email";
        endif;

        if (empty($formulario['senha'])) :
          $dados['erro_senha'] = "preencha o campo senha";
        endif;

      else :
        if (Valida::email($dados['email'])) {
          $dados['erro_email'] = "preencha correctamente o campo email";
        } else {
          $checarlogin = $this->Data->checalogin($dados['email'], $dados['senha']);
          // var_dump($checarlogin);
          // exit;
          if ($checarlogin) :

            Url::redireciona('home');
            $this->criarsessao($checarlogin);
            Sessao::notify('auth', 'Login realizado com sucesso', null, null, null);
            exit;
          // Sessao::browser("browser","login","login feito com sucesso");

          else :
            Sessao::notify('auth', 'Nome ou senha estão errados', "error", null, "('#formAuth')");

            $dados['erro_email'] = "Dados invalidos";
            $dados['erro_senha'] = "Dados invalidos";
          endif;
        }


      endif;
    //  var_dump($formulario);
    else :
      $dados = [
        'email' => '',
        'senha' => '',
        'erro_email' => '',
        'erro_senha' => ''
      ];
    endif;

    $title = 'login';
    return $this->view('login', compact('title', 'dados'));
  }

  private function  criarsessao(array $usuario)
  {

    $_SESSION['BlogUser_id'] = $usuario['id_usuarios'];
    $_SESSION['BlogUser_nome'] = $usuario['nome'];
    $_SESSION['BlogUser_email'] = $usuario['email'];
    // $_SESSION['BlogUser_img'] = !empty($usuario['imagem']) ? URL . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $usuario['imagem'] : URL . '/public/img/user-logo.jpg';
  }
  public function sair()
  {
    unset($_SESSION['BlogUser_id']);
    unset($_SESSION['BlogUser_nome']);
    unset($_SESSION['BlogUser_email']);
    // unset($_SESSION['BlogUser_img']);
    session_destroy();
    Url::redireciona('login');
  }
  public function create()
  {
    if (Sessao::nivel1() || Sessao::nivel0()) :
      session_destroy();
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
        }elseif($this->Data->checaEmail($dados['email'])){
          Sessao::sms("valid", "Email já existente no sistema", "alert alert-danger");
          $dados['error'] = "Não podem existir duas contas com mesmo email";
        } else {
          $dados['senha'] = Valida::pass_segura($dados['senha']);
          $create = $this->Data->storeUser($dados);
          if ($create) {
            URL::redireciona("login");
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
