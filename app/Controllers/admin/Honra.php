<?php



namespace App\Controllers\Admin;

use App\Helpers\Sessao;
use App\Helpers\Url;
use App\Libraries\Controller;

class Honra extends Controller
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
    $file = 'admin/honra';
    $title = 'honra';
    return $this->view('layouts/admin/app', compact('file', 'title', 'messages','user','contact','post'));
  }
}
