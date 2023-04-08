<?php
/*
 * App Core Class
 * Creates URL & loads Core Controller
 * URL TEMPLATE - /controller/method/parameters
 */

class Core
{
    protected string $currentController = 'Pages';
    protected object $controllerInstance;
    protected string $currentMethod = 'notfound';
    protected array $params = [];
    protected array $url;

    public function __construct()
    {
        $this->url = $this->getUrl();
        // controller logic
        $this->controllerInstance = $this->getController();
        // method logic
        $this->currentMethod = $this->getMethod();
        // parameters logic
        $this->params = $this->getParams();
        //
        call_user_func_array([$this->controllerInstance, $this->currentMethod], $this->params);
    }

    public function getUrl(): array
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return array();
    }

    public function getController(): object
    {
        if (isset($this->url[0])) {
            $controller = ucwords($this->url[0]);
            unset($this->url[0]);
            if (file_exists("../app/controllers/{$controller}.php")) {
                $this->currentController = $controller;
            }
        }
        require_once "../app/controllers/{$this->currentController}.php";
        $this->controllerInstance = new $this->currentController;
        return $this->controllerInstance;
    }

    public function getMethod(): string
    {
        if (isset($this->url[1])) {
            $method = $this->url[1];
            unset($this->url[1]);
            if (method_exists($this->controllerInstance, $method)) {
                $this->currentMethod = $method;
            }
        }
        return $this->currentMethod;
    }

    public function getParams(): array
    {
        return $this->url ? array_values($this->url) : [];
    }
}