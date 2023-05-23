<?php



namespace App\Controllers\Admin;

use App\Helpers\Sessao;
use App\Helpers\Url;
use App\Libraries\Controller;

class Login extends Controller
{
  private $Data;
  public function __construct()
  {
    if(Sessao::nivel1()){
      session_destroy();
      Url::redireciona("home");
    }elseif(Sessao::nivel0()){
      Url::redireciona("admin/home");
    }
    $this->Data=$this->model("admin\Auth");
  }
  public function index()
  {
    // if (Sessao::nivel0()) :
    //   Url::redireciona('admin/home');
    // endif;

    $formulario = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //  var_dump($formulario);
    if (isset($formulario['btn_log'])) :
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

        
        $checarlogin = $this->Data->checalogin($dados['email'], $dados['senha']);
        // exit;
        if ($checarlogin) :

          
          Url::redireciona('admin/home');
          $this->criarsessao($checarlogin);
          Sessao::notify('auth1', 'Login realizado com sucesso', null, null, null);
          exit;
        // var_dump($_SESSION);

        else :
          Sessao::notify('auth1', 'Email ou senha estão errados', "error", null, "('#formAuth')");
          $dados['erro_email'] = "Dados invalidos";
          $dados['erro_senha'] = "Dados invalidos";
        endif;



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



    $file = 'admin'.DIRECTORY_SEPARATOR.'login';
    $title = 'admin/login';
    return $this->view($file, compact('title','dados'));
  }
  private function  criarsessao(array $usuario)
  {

    $_SESSION['BlogUserA_id'] = $usuario['id_usuarios'];
    $_SESSION['BlogUserA_nome'] = $usuario['nome'];
    $_SESSION['BlogUserA_email'] = $usuario['email'];
  }
  public function sair()
  {
    unset($_SESSION['BlogUserA_id']);
    unset($_SESSION['BlogUserA_nome']);
    unset($_SESSION['usuarios_email']);
    session_destroy();
    Url::redireciona('admin/login');
  }
}
