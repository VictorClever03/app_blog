<?php



namespace App\Controllers;

use App\Helpers\Sessao;
use App\Helpers\Url;
use App\Libraries\Controller;

class Blog extends Controller
{
  private $Data;
  public function __construct()
  {
    $this->Data = $this->model("user\Posts");
    if (!Sessao::nivel1()) :
      Url::redireciona('home');
    endif;
  }
  public function details($id)
  {
    $id = filter_var($id['id'], FILTER_VALIDATE_INT);
    $post = $this->Data->getOne($id);
    $Rposts = $this->Data->getRecentPosts();
    $count=$this->Data->getCountComment($id);
    $comments=$this->Data->getComments($id);
    
    

    $file = 'blogDetails';
    $title = 'blog';
    return $this->view('layouts/user/app', compact('file', 'title', 'post', 'Rposts','count','comments'));
  }
  public function comments($id)
  {
    $id = filter_var($id['id'], FILTER_VALIDATE_INT);
    $form=filter_input_array(
      INPUT_POST,FILTER_DEFAULT
    );
    
    if(isset($form['btn-comments'])){
      $dados=['comment'=>trim($form['comment']),'error'=>''];
      if(in_array("",$form)){
        if(empty($form['comment'])){
          $dados['error']="Preencha o campo";
          Sessao::notify("error","Preencha o campo",'error');
        }
      }else{
        $save = $this->Data->createComment($dados, $id);
        if($save){
          Sessao::notify("success","Comentario enviado");
          Url::redireciona("details/".$id);
          exit;
        }else{
          Sessao::notify("error","Erro com comentario","error");
          Url::redireciona("details/".$id);
          exit;
        }
      }
    }else{
      $dados=['comment'=>'','error'=>''];

    }
    
  }
  public function deleteComment($id)
  {
    
    $post=filter_var($id['idPost'], FILTER_VALIDATE_INT);
    $id=filter_var($id['id'], FILTER_VALIDATE_INT);
    $delete =$this->Data->deleteComment($id);
    if($delete){
      Sessao::notify('success', 'Comentário deletado', null, null, null);
      Url::redireciona("details/".$post);
      exit;
    }else{
      Sessao::notify('error', 'Comentário não deletado', "error", null, null);
      Url::redireciona("details/".$post);
      exit;
    }
  }
  public function editComment($id)
  {
 
    $postId = filter_var($id['idPost'], FILTER_VALIDATE_INT);
    $idComent = filter_var($id['id'], FILTER_VALIDATE_INT);
    $post = $this->Data->getOne($postId);
    $Rposts = $this->Data->getRecentPosts();
    $count = $this->Data->getCountComment($id);
    $comment = $this->Data->getComment($idComent,$postId);
    $form=filter_input_array(
      INPUT_POST,FILTER_DEFAULT
    );
    
    if(isset($form['btn-comments'])){
      $dados=['comment'=>trim($form['comment']),'error'=>''];
      if(in_array("",$form)){
        if(empty($form['comment'])){
          $dados['error']="Preencha o campo";
          Sessao::notify("error","Preencha o campo",'error');
        }
      }else{
        $update = $this->Data->updateComment($dados, $idComent);
        if($update){
          Sessao::notify("success","Comentario atualizado");
          Url::redireciona("details/".$postId);
          exit;
        }else{
          Sessao::notify("error","Erro com comentario","error");
          Url::redireciona("details/".$postId);
          exit;
        }
      }
    }else{
      $dados=['comment'=>'','error'=>''];

    }
    
    
    

    $file = 'blogEdit';
    $title = 'blog';
    return $this->view('layouts/user/app', compact('file', 'title', 'post', 'Rposts','count','comment'));
  }
}
