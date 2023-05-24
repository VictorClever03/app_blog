<?php



namespace App\Controllers\Admin;

use App\Helpers\Sessao;
use App\Helpers\Url;
use App\Libraries\Controller;

class Home extends Controller
{
  private $Data;
  public function __construct()
  {
    $this->Data = $this->model("admin\Home");
    if (Sessao::nivel1()) {
      session_destroy();
      Url::redireciona("home");
    } elseif (!Sessao::nivel0()) {
      Url::redireciona("admin/login");
    }
  }
  public function index()
  {
    $messages = $this->Data->getAllMessages();
    $user=$this->Data->getCountUsers();
    $contact=$this->Data->getCountMessages();
    $post=$this->Data->getCountPosts();
//     var_dump($user,$contact,$post);
// exit;
    $file = 'admin/home';
    $title = 'home';
    return $this->view('layouts/admin/app', compact('file', 'title', 'messages','user','contact','post'));
  }
  public function deleteMessage($id){
 
    $id=filter_var($id['id'], FILTER_VALIDATE_INT);
    $delete =$this->Data->deleteMessage($id);
    if($delete){
      Sessao::notify('success', 'Mensagem deletada', null, null, null);
      Url::redireciona("admin/home");
    }else{
      Sessao::notify('error', 'Mensagem não deletada', "error", null, null);
      Url::redireciona("admin/home");
    }
  }
}
