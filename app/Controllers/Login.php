<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Helpers\Sessao;
use App\Helpers\Url;
use App\Helpers\Valida;
use App\Libraries\Controller;

class Login extends Controller
{
private $Data;
public function __construct(){
  $this->Data = $this->model("user\Usuarios");
  if (Sessao::nivel1()) :
    Url::redireciona('home');
  endif;
}
     // Autenticacao do usuario
  public function index()
  {
    
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
            Sessao::notify('auth', 'Email ou senha estão errados', "error", null, "('#formAuth')");

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
  
}
