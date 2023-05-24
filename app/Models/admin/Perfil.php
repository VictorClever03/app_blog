<?php

namespace App\Models\admin;

use App\Libraries\Conexao;

class Perfil
{

    private $db;
    public function __construct()
    {
        $this->db = new Conexao();
    }

      // perfil

      public function updateperfil($data,$id){
        $this->db->query("UPDATE usuarios SET nome=:nome, email=:email WHERE id_usuarios=:id");
        $this->db->bind(':nome',$data['nome']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':id',$id);
        if ($this->db->executa() AND $this->db->total()) {
            return true;
        } else {
            return false;
        }
        
    }
    public function viewperfil($id){
        $this->db->query("SELECT * FROM usuarios WHERE id_usuarios =:id");
        $this->db->bind(':id',$id);
        if ($this->db->executa()and $this->db->total()) {
            return $this->db->resultado();
        } else {
            return false;
        }
    }
   
    
  
    public function newpass($data, int $id)
    {
        $this->db->query("UPDATE usuarios SET senha=:senha WHERE id_usuarios=:id");
        $this->db->bind(':senha',$data['novasenha']);
        $this->db->bind(':id',$id);
        if ($this->db->executa() AND $this->db->total()) {
            return true;
        } else {
            return false;
        }
    }
}




