<?php

namespace App\Models\user;

use App\Helpers\Valida;
use App\Libraries\Conexao;

class Posts
{
  private $db;
  public function __construct()
  {
    $this->db = new Conexao();
  }
  public function store($data)
  {
    $this->db->query("INSERT INTO postagens(titulo,imagem,conteudo,usuarios_id,categoria_id) VALUES (:titulo,:imagem,:conteudo,:usuarios_id,:categoria_id)");
    $this->db->bind(":titulo", $data['title']);
    $this->db->bind(":imagem", $data['img']);
    $this->db->bind(":conteudo", $data['desc']);
    $this->db->bind(":usuarios_id", $_SESSION['BlogUserA_id']);
    $this->db->bind(":categoria_id", $data['cat']);
    if ($this->db->executa() and $this->db->total()) {
      return true;
    } else {
      return false;
    }
  }
  public function update($data, $id)
  {
    $this->db->query("UPDATE postagens SET titulo=:titulo, conteudo=:conteudo WHERE id_postagens=:id");
    $this->db->bind(":titulo", $data['title']);
    $this->db->bind(":conteudo", $data['desc']);
    $this->db->bind(":id", $id);
    if ($this->db->executa() and $this->db->total()) {
      return true;
    } else {
      return false;
    }
  }
  public function delete($id)
  {
    $this->db->query("DELETE FROM postagens WHERE id_postagens = :id");
    $this->db->bind(":id", $id);
    if ($this->db->executa() and $this->db->total()) {
      return true;
    } else {
      return false;
    }
  }
  public function getPosts()
  {
    $this->db->query("SELECT *, usuarios.nome as nome_u, categoria.nome as nome_c FROM postagens INNER JOIN usuarios ON postagens.usuarios_id=usuarios.id_usuarios INNER JOIN categoria ON postagens.categoria_id=categoria.id_categoria ORDER BY id_postagens DESC");
    if ($this->db->executa() and $this->db->total()) {
      return $this->db->resultados();
    } else {
      return false;
    }
  }
  public function getRecentPosts()
  {
    $this->db->query("SELECT *, usuarios.nome as nome_u, categoria.nome as nome_c FROM postagens INNER JOIN usuarios ON postagens.usuarios_id=usuarios.id_usuarios INNER JOIN categoria ON postagens.categoria_id=categoria.id_categoria ORDER BY id_postagens DESC LIMIT 5");
    if ($this->db->executa() and $this->db->total()) {
      return $this->db->resultados();
    } else {
      return false;
    }
  }
  public function getOne($id)
  {
    $this->db->query("SELECT *, usuarios.nome as nome_u, categoria.nome as nome_c FROM postagens INNER JOIN usuarios ON postagens.usuarios_id=usuarios.id_usuarios INNER JOIN categoria ON postagens.categoria_id=categoria.id_categoria WHERE postagens.id_postagens=:id");
    $this->db->bind(":id", $id);
    if ($this->db->executa() and $this->db->total()) {
      return $this->db->resultado();
    } else {
      return false;
    }
  }
  public function read_c()
  {
    $this->db->query("SELECT * FROM  categoria ORDER BY id_categoria DESC");

    if ($this->db->executa() and $this->db->total()) :
      $resultado = $this->db->resultados();
      return $resultado;

    else :
      return false;

    endif;
  }

  // <!-- ========== Start Comments ========== -->
  public function createComment($data, $id)
  {
    $this->db->query("INSERT INTO comentarios(conteudo,usuarios_id,postagens_id) VALUES (:conteudo,:user,:post)");
    
    $this->db->bind(":conteudo", $data['comment']);
    $this->db->bind(":user", $_SESSION['BlogUser_id']);
    $this->db->bind(":post", $id);
    if ($this->db->executa() and $this->db->total()) {
      return true;
    } else {
      return false;
    }
  }
  public function getCountComment($id)
  {
    $this->db->query("SELECT COUNT(id_coment) as total FROM comentarios WHERE postagens_id = :id");
    $this->db->bind(":id", $id);
        
    if($this->db->executa() AND $this->db->total()):
        return $this->db->resultado();
    else:
        return false;
    endif;
  }
  public static function getCountComment0($id)
  {
    $db = new Conexao();
    $db->query("SELECT COUNT(id_coment) as total FROM comentarios WHERE postagens_id = :id");
    $db->bind(":id", $id);
        
    if($db->executa() AND $db->total()):
        return $db->resultado();
    else:
        return false;
    endif;
  }
  public function getComments($id)
  {
    $this->db->query("SELECT *, postagens.conteudo as conteudo_p, comentarios.conteudo as conteudo_c, comentarios.usuarios_id as user FROM  comentarios INNER JOIN postagens ON comentarios.postagens_id=postagens.id_postagens INNER JOIN usuarios ON comentarios.usuarios_id=usuarios.id_usuarios WHERE comentarios.postagens_id = :id ORDER BY id_coment DESC");
    $this->db->bind(":id",$id);
    if ($this->db->executa() AND $this->db->total()) :
      $resultado = $this->db->resultados();
      return $resultado;

    else :
      return false;

    endif;
  }
  public function getComment($idComent,$idPost)
  {
    $this->db->query("SELECT *, postagens.conteudo as conteudo_p, comentarios.conteudo as conteudo_c, comentarios.usuarios_id as user FROM  comentarios INNER JOIN postagens ON comentarios.postagens_id=postagens.id_postagens INNER JOIN usuarios ON comentarios.usuarios_id=usuarios.id_usuarios WHERE comentarios.postagens_id = :idPost AND comentarios.id_coment = :idComent ");
    $this->db->bind(":idPost",$idPost);
    $this->db->bind(":idComent",$idComent);
    if ($this->db->executa() AND $this->db->total()) :
      $resultado = $this->db->resultado();
      return $resultado;

    else :
      return false;

    endif;
  }
  public function deleteComment($id)
  {
    $this->db->query("DELETE FROM comentarios WHERE id_coment = :id AND usuarios_id = :user");
    $this->db->bind(":id", $id);
    $this->db->bind(":user", $_SESSION['BlogUser_id']);
    if ($this->db->executa() and $this->db->total()) {
      return true;
    } else {
      return false;
    }
  }
  public function updateComment($data, $id)
  {
    $this->db->query("UPDATE comentarios SET conteudo=:conteudo WHERE id_Coment=:id");
    $this->db->bind(":conteudo", $data['comment']);
    $this->db->bind(":id", $id);
    if ($this->db->executa() and $this->db->total()) {
      return true;
    } else {
      return false;
    }
  }
  // <!-- ========== End Comments ========== --> 
}
