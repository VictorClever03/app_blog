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
    $router->get("/contact", handler:"Home:contact");
    $router->post("/contact", handler:"Home:contact");
    $router->get("/login", handler:"Login:index");
    $router->get("/sair", handler:"Login:sair");
    $router->get("/createUser", handler:"Home:create");
    
    // autentification
    $router->post("/createUser", handler:"Home:create");
    $router->post("/login", handler:"Login:index");
    
    $router->group("error");
    $router->get("/{errcode}", handler:"Error:index");

    // admin routers
    $router->namespace("App\Controllers\Admin");
    $router->group("admin");
    $router->get("/", handler:"Login:index");
    $router->post("/", handler:"Login:index");
    $router->get("/login", handler:"Login:index");
    $router->post("/login", handler:"Login:index");
    $router->get("/sair", handler:"Login:sair");
    $router->get("/home", handler:"Home:index");
    $router->get("/config", handler:"Config:index");
    $router->post("/config", handler:"Config:index");
    $router->post("/changename", handler:"Config:changename");
    $router->post("/deleteMessage/{id}", handler:"Home:deleteMessage");




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
