<?php
namespace App\Controllers;
class Controller {
    protected function view($viewName, $data = []) {
        $viewPath = 'views/' . $viewName . '.php';

        if (file_exists($viewPath)) {
            extract($data);
            require $viewPath;
        } else {
            die("View not found: $viewPath");
        }
    }
}
