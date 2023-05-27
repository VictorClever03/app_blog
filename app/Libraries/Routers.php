<?php

namespace App\Libraries;

use CoffeeCode\Router\Router;

class Routers
{
  public function __construct()
  {
    $router = new Router(URL);
// links navbar
    $router->namespace("App\Controllers");
    $router->group(null);
    $router->get("/", handler:"Home:index");
    $router->get("/home", handler:"Home:index");
    $router->get("/about", handler:"Home:about");
    $router->get("/cursos", handler:"Home:cursos");
    $router->get("/team", handler:"Home:team");
    $router->get("/blog", handler:"Home:blog");
    $router->get("/details/{id}", handler:"Blog:details");
    $router->get("/contact", handler:"Home:contact");
    $router->post("/contact", handler:"Home:contact");
    $router->get("/login", handler:"Login:index");
    $router->get("/sair", handler:"Login:sair");
    $router->get("/createUser", handler:"Home:create");
    $router->post("/comment/edit/{id}/{idPost}", handler:"Blog:editComment");
    $router->post("/comment/create/{id}", handler:"Blog:comments");
    $router->post("/comment/delete/{id}/{idPost}", handler:"Blog:deleteComment");
    
    // autentification
    $router->post("/createUser", handler:"Home:create");
    $router->post("/login", handler:"Login:index");
    
    $router->group("error");
    $router->get("/{errcode}", handler:"Error:index");

    // admin routers
    $router->namespace("App\Controllers\Admin");
    $router->group("admin");
    $router->get("/", handler:"Login:index");
    $router->get("/login", handler:"Login:index");
    $router->get("/sair", handler:"Login:sair");
    $router->get("/home", handler:"Home:index");
    $router->get("/posts", handler:"Posts:index");
    $router->get("/posts/create", handler:"Posts:create");
    $router->get("/posts/edit/{id}", handler:"Posts:edit");
    $router->get("/categorias", handler:"Categoria:index");
    $router->get("/usuarios", handler:"Usuarios:index");
    $router->get("/newH", handler:"Honra:create");
    $router->get("/honrados", handler:"Honra:index");
    $router->post("/delete/honra/{id}", handler:"Honra:delete");
    $router->post("/edit/honra/{id}", handler:"Honra:edit");
    $router->post("/newH", handler:"Honra:create");
    $router->get("/config", handler:"Config:index");
    $router->post("/cadastrar/usuario", handler:"Usuarios:create");
    $router->post("/editar/usuario/{id}", handler:"Usuarios:edit");
    $router->post("/delete/usuario/{id}/{nivel}", handler:"Usuarios:delete");
    $router->post("/", handler:"Login:index");
    $router->post("/login", handler:"Login:index");
    $router->post("/config", handler:"Config:index");
    $router->post("/changename", handler:"Config:changename");
    $router->post("/deleteMessage/{id}", handler:"Home:deleteMessage");
    $router->post("/cadastrar/categoria", handler:"Categoria:cadastrar");
    $router->post("/editar/categoria/{id}", handler:"Categoria:edit");
    $router->post("/deleteCategory/{id}", handler:"Categoria:delete");
    $router->post("/posts/create", handler:"Posts:create");
    $router->post("/posts/edit/{id}", handler:"Posts:edit");
    $router->post("/delete/post/{id}", handler:"Posts:delete");




    /**
     * This method executes the routes
     */
    $router->dispatch();


    /*
 * Redirect all errors
 */
    if ($router->error()) {
      $router->redirect("/error/{$router->error()}");
    }
  }
}
