<?php

namespace App\Models\admin;

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
}
