<?php

namespace app\core;

use app\core\exception\ForbiddenException;
use app\core\exception\NotFoundException;

class Router
{
    public Request $request;
    public Response $response;
    protected $routes = [];


    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get(string $path, array $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        //var_dump($path);
        if ($callback == false) {
            $this->response->setStatuscode(404);
            //return $this->renderView("404");
            throw new NotFoundException();

        }

        //If callback is defined as string, just render template.
        if (is_string($callback)) {
            return Application::$app->view->renderView($callback);
        }
        if (is_array($callback)) {
            /** @var app\core\Controller $controller */
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            foreach ($controller->getMiddlewares() as $middleware)
            {
                $middleware->execute();
            }
            $callback[0]=$controller;
        }

        return call_user_func($callback, $this->request, $this->response);
    }

}
