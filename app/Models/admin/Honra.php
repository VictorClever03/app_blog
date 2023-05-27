<?php

namespace App\Models\admin;

use App\Libraries\Conexao;

class Honra
{
  private $db;
  public function __construct()
  {
    $this->db = new Conexao;
  }
  // relatorios dde vendas
  public function honrados()
  {
    $this->db->query("SELECT * FROM  honra ");

    if ($this->db->executa() and $this->db->total()) :
      $resultado = $this->db->resultados();
      return $resultado;

    else :
      return false;

    endif;
  }
  public function honrado($id)
  {
    $this->db->query("SELECT * FROM  honra WHERE id_honra=:id");
    $this->db->bind(":id", $id);
    if ($this->db->executa() and $this->db->total()) :
      $resultado = $this->db->resultados();
      return $resultado;

    else :
      return false;

    endif;
  }
  public function create($dados)
  {
    $this->db->query("INSERT INTO honra(nome,media,descricao,imagem) VALUES(:nome,:media,:descricao,:imagem) ");
    $this->db->bind(":nome", $dados['nome']);
    $this->db->bind(":media", $dados['media']);
    $this->db->bind(":descricao", $dados['desc']);
    $this->db->bind(":imagem", $dados['img']);
    if ($this->db->executa() and $this->db->total()) :
      return true;

    else :
      return false;

    endif;
  }
  public function update($dados)
  {
    $this->db->query("UPDATE honra SET nome=:nome, media=:media, descricao=:descricao, imagem=:img");
    $this->db->bind(":nome", $dados['nome']);
    $this->db->bind(":media", $dados['media']);
    $this->db->bind(":descricao", $dados['desc']);
    $this->db->bind(":imagem", $dados['img']);
    if ($this->db->executa() and $this->db->total()) :
      return true;

    else :
      return false;

    endif;
  }
  public function delete($id)
  {
    $this->db->query("DELETE FROM honra WHERE id_honra=:id ");
    $this->db->bind(":id", $id);
    
    if ($this->db->executa() and $this->db->total()) :
      return true;

    else :
      return false;

    endif;
  }
}
