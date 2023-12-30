<?php
namespace App\Router;
class RedirectBackWithErrors {
    protected $errorMessage;
    protected $title;

    public function __construct($title,$errorMessage) {
        $this->errorMessage = $errorMessage;
        $this->title = $title;
    }

    public function back() {
        $_SESSION[$this->title] = $this->errorMessage;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}