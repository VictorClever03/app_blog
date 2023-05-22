<?php

namespace App\Controllers;

use App\Helpers\Sessao;
use App\Helpers\Url;
use App\Libraries\Controller;

class  Home  extends Controller
{
  private $data;
  public function __construct()
  {

    $this->data = $this->model("user\Usuarios");
  }
  public function index()
  {
   

   
    $file = 'homepage';
    $title = 'home';
    return $this->view('layouts/user/app', compact('file','title'));
  }
  public function about()
  {
    $file = 'about';
    $title = 'about';
    return $this->view('layouts/user/app', compact('file','title'));
  }
  public function cursos()
  {
    $file = 'cursos';
    $title = 'cursos';
    return $this->view('layouts/user/app', compact('file','title'));
  }
  public function blog()
  {
    $file = 'blog';
    $title = 'blog';
    return $this->view('layouts/user/app', compact('file','title'));
  }
  public function team()
  {
    $file = 'team';
    $title = 'team';
    return $this->view('layouts/user/app', compact('file','title'));
  }
  public function contact()
  {
    $file = 'contact';
    $title = 'contact';
    return $this->view('layouts/user/app', compact('file','title'));
  }
  public function login()
  {
   
    $title = 'login';
    return $this->view('login', compact('title'));
  }
  public function create()
  {
   
    $title = 'create';
    return $this->view('create', compact('title'));
  }
}
