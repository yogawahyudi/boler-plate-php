<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Database\Database;
use App\Models\Criteria;
use App\Router\RedirectBackWithErrors;
use App\Validators\Validators;

class CriteriaController extends Controller {
    public function index() {
        $criteria = new Criteria();
        $allCriteria = $criteria->getAll();
        // Panggil view dengan memberikan data
        $this->view('criteria/criteria', [
            'criterias' => $allCriteria
        ]);
    }

    public function create() {
        // Panggil view dengan memberikan data
        $this->view('criteria/create', ['title' => 'Tentang Kami']);
    }

    public function store()
    {   
        $validate = new Validators($this->request, [
            'criteria' => 'required',
            'weight' => 'required',
            'type' => 'required'
        ]);

        $validate->validate();
        if ($validate->fails()) {
            $redirect = new RedirectBackWithErrors('Error',$validate->firstErrors());
            $redirect->back();
        }

        $criteria = new Criteria();
        try {
            $criteria->create([
                'criteria'=>$this->request['criteria'],
                'weight' => $this->request['weight'],
                'type' => $this->request['type']
            ]);
            $redirect = new RedirectBackWithErrors('Success','Success created criteria');
            $redirect->back();
        } catch (\Throwable $th) {
            $redirect = new RedirectBackWithErrors('Error',$th->getMessage());
            $redirect->back();
        }
    }
}
