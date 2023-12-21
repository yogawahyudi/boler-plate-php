<?php
namespace App\Router;

use Exception;

class Router {
    private $routes = [];

    public function addRoute($url, $handler, $methods = ['GET'], $middlewares = []) {
        $this->routes[] = [
            'url' => $url,
            'handler' => $handler,
            'methods' => $methods,
            'middlewares' => $middlewares,
        ];
    }

    public function route($url) {
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['url'] === $url && in_array($method, $route['methods'])) {
                $handler = $route['handler'];
                $this->runMiddlewares($route['middlewares'], function () use ($handler) {
                    $this->executeHandler($handler);
                });
                return;
            }
        }

        $this->pageNotFound();
    }

    private function runMiddlewares($middlewares, $finalHandler) {
        $middlewares = array_reverse($middlewares); // Balik urutan untuk berantai
        $next = $finalHandler;
    
        foreach ($middlewares as $middleware) {
            $nextMiddleware = function () use ($middleware, $next) {
                $this->callMiddleware($middleware, $next);
            };
            $next = $nextMiddleware;
        }
    
        // Mulai berantai middleware
        $next();
    }

    private function callMiddleware($middleware, $next) {
        // Implementasi logika panggilan middleware
        // Misalnya, panggil fungsi atau instansiasi class middleware.
        // Lakukan apa pun yang diperlukan untuk meng-handle middleware.
        if (is_callable($middleware)) {
            // Middleware berupa fungsi
            call_user_func($middleware, $next);
        } elseif (is_string($middleware) && class_exists($middleware)) {
            // Middleware berupa class
            $middlewareInstance = new $middleware();
            if (method_exists($middlewareInstance, 'handle')) {
                $middlewareInstance->handle($next);
            } else {
                throw new Exception("Method 'handle' not found in middleware class: $middleware");
            }
        } else {
            throw new Exception("Invalid middleware: " . print_r($middleware, true));
        }
    }
    

    private function executeHandler($handler) {
        // Lakukan apa pun yang diperlukan untuk menjalankan handler.
        // Misalnya, memanggil fungsi atau mengarahkan ke file tertentu.
        if (is_callable($handler)) {
            // Handler berupa fungsi
            call_user_func($handler);
        } elseif (is_string($handler) && strpos($handler, '@') !== false) {
            // Handler berupa metode dalam suatu kelas (contoh: "Namespace\HomeController@namaMetode")
            list($class, $method) = explode('@', $handler);
            $controllerClass = "App\\Controllers\\$class";
            $controllerInstance = new $controllerClass();

            if (method_exists($controllerInstance, $method)) {
                $controllerInstance->$method();
            } else {
                $this->pageNotFound();
            }
        } else {
            $this->pageNotFound();
        }
    }

    private function pageNotFound() {
        header("HTTP/1.0 404 Not Found");
        echo '404 Page Not Found';
    }
}
