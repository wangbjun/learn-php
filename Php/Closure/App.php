<?php

/**
 * 演示闭包的使用,路由
 * Class App
 */
class App
{
    protected $routes = [];
    protected $responseStatus = '200 OK';
    protected $responseContentType = 'text/html';
    protected $responseBody = 'Hello World';

    public function addRoute(string $path, Closure $callback)
    {
        $this->routes[$path] = $callback->bindTo($this, __CLASS__);
    }

    public function dispatch(string $path)
    {
        foreach ($this->routes as $routePath => $callback) {
            if ($routePath === $path) {
                $callback();
            }
        }
        header('HTTP/1.1 ' . $this->responseStatus);
        header('Content-Type: ' . $this->responseContentType);
        header('Content-Length: ' . mb_strlen($this->responseBody));
        echo $this->responseBody;
    }

}
