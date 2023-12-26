<?php

namespace App\Controllers;

use App\Controllers\Controller;

class HomeController extends Controller {
    public function index() {
        // Panggil view dengan memberikan data
        $this->view('home', ['title' => 'Home']);
    }

    public function about() {
        // Panggil view dengan memberikan data
        $this->view('about', ['title' => 'Tentang Kami']);
    }
}
