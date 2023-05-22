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
    $router->get("/login", handler:"Home:login");
    $router->get("/createUser", handler:"Home:create");



    $router->group("error");
    $router->get("/{errcode}", handler:"Error:index");
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
