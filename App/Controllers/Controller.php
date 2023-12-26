<?php
namespace App\Controllers;
class Controller {
    protected $request;

    public function __construct() {
        $this->request = $_REQUEST;
    }

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
