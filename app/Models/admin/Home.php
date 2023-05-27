<?php

namespace App\Models\admin;

use App\Libraries\Conexao;
use DateTime;
class Home
{

  private $db;
  public function __construct()
  {
    $this->db = new Conexao();
  }

  public function getAllMessages(){
    $this->db->query("SELECT * FROM contact ORDER BY id DESC");
        
        
        if($this->db->executa() AND $this->db->total()):
            return $this->db->resultados();
        else:
            return false;
        endif;
  }
  public function deleteMessage($id){
    
    $this->db->query("DELETE FROM contact WHERE id = :id");
      $this->db->bind(":id",$id);
      
      if($this->db->executa() AND $this->db->total()){
        return true;
      }else{
        return false;
      }
  }

  public function getCountUsers(){
    $this->db->query("SELECT COUNT(id_usuarios) as userTotal FROM usuarios WHERE id_usuarios!=:id");
        
        $this->db->bind(":id",$_SESSION['BlogUserA_id']);
        if($this->db->executa() AND $this->db->total()):
            return $this->db->resultado();
        else:
            return false;
        endif;
  }
  public function getCountMessages(){
    $this->db->query("SELECT COUNT(id) as messageTotal FROM contact ");
        
        
        if($this->db->executa() AND $this->db->total()):
            return $this->db->resultado();
        else:
            return false;
        endif;
  }
  public function getCountPosts(){
    $this->db->query("SELECT COUNT(id_postagens) as postTotal FROM postagens ");
        
        
        if($this->db->executa() AND $this->db->total()):
            return $this->db->resultado();
        else:
            return false;
        endif;
  }


  
  
}
