<?php

namespace App\Controllers;

use App\Controllers\Controller;

class DataController extends Controller {
    public function index() {
        // Panggil view dengan memberikan data
        $this->view('data');
    }

    public function about() {
        // Panggil view dengan memberikan data
        $this->view('about', ['title' => 'Tentang Kami']);
    }
}
