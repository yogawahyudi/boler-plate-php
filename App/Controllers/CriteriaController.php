<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Database\Database;
use App\Models\Criteria;

class CriteriaController extends Controller {
    public function index() {
        // Panggil view dengan memberikan data
        $this->view('criteria/criteria', [
            'criteria' => []
        ]);
    }

    public function create() {
        // Panggil view dengan memberikan data
        $this->view('criteria/create', ['title' => 'Tentang Kami']);
    }

    public function store()
    {
        $criteria = new Criteria();
        // $criteria->create([
        //     'criteria'=>'test2',
        //     'weight' => '5.0113',
        //     'type' => 'benefit'
        // ]);
    }
}
