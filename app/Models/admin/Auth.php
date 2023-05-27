<?php
namespace App\Models\admin;

use App\Libraries\Conexao;

class Auth {

   private $db;
    public function __construct()
    {
       $this->db = new Conexao();
    }

    public function checalogin($email,$senha){
      $this->db->query("SELECT * FROM usuarios WHERE email=:email AND adm=:nivel");
      $this->db->bind(':email',$email);
      $this->db->bind(':nivel',"0");
      $this->db->executa();
      if($this->db->executa() AND $this->db->total()):
          $resultado=$this->db->resultado();
      
               if (password_verify($senha, $resultado['senha'])) :
                  return $resultado;
              else:
                  return false;
              endif;
              
      else:
          return false;
      endif;
  }
    public function checanome(string $nome){
      $this->db->query("SELECT nome FROM usuarios WHERE nome=:nome");
      $this->db->bind(':nome',$nome);
      $this->db->executa();
      if($this->db->executa() AND $this->db->total()):
          return true;
      else:
          return false;
      endif;
  }
    public function checaemail(string $email){
      $this->db->query("SELECT email FROM usuarios WHERE email=:email");
      $this->db->bind(':email',$email);
      $this->db->executa();
      if($this->db->executa() AND $this->db->total()):
          return true;
      else:
          return false;
      endif;
  }
    public function createUser($data){
      $this->db->query("INSERT INTO usuarios(nome, email, senha, adm) VALUES(:nome, :email, :senha, :nivel)");
      $this->db->bind(":nome", $data['nome']); 
      $this->db->bind(":email", $data['email']);
      $this->db->bind(":senha", $data['senha']);
      $this->db->bind(":nivel", $data['nivel']);
      if($this->db->executa() AND $this->db->total()){
        return true;
      }else{
        return false;
      }
    }
    public function updateUser($data,$id){
      $this->db->query("UPDATE usuarios SET nome=:nome, email=:email, adm=:nivel WHERE id_usuarios=:id");
      $this->db->bind(":nome", $data['nome']); 
      $this->db->bind(":email", $data['email']);
      $this->db->bind(":nivel", $data['nivel']);
      $this->db->bind(":id", $id);
      if($this->db->executa() AND $this->db->total()){
        return true;
      }else{
        return false;
      }
    }
    public function getUsers(){
      $this->db->query("SELECT * FROM usuarios WHERE id_usuarios!=:id ORDER BY id_usuarios DESC");
      $this->db->bind(":id",$_SESSION['BlogUserA_id']);
      $this->db->executa();
      if($this->db->executa() AND $this->db->total()):
          return $this->db->resultados();
      else:
          return false;
      endif;
    }
    public function deleteUser($id){
      $this->db->query("DELETE FROM usuarios WHERE id_usuarios = :id");
      $this->db->bind(":id",$id);
      
      if($this->db->executa() AND $this->db->total()){
        return true;
      }else{
        return false;
      }
    }
   
    
}