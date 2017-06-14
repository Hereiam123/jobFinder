<?php

namespace App\Controller;

use App\Controller\AppController;

class JobsController extends AppController{
    public $name='Jobs';

    /*
    *   Default Index Method
    */
    public function index(){
        $jobs = "Whatever";
        $this->set('jobs',$jobs);
    }
}


