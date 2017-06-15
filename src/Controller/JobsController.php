<?php

namespace App\Controller;

use App\Controller\AppController;

class JobsController extends AppController{
    public $name='Jobs';

    /*
    *   Default Index Method
    */
    public function index(){

        //Set query options
        $options=array(
            'order'=>array('Jobs.created'=>'asc'),
            'limit'=>10
        );

        //Get job info
        $jobs = $this->Jobs->find('all',$options)->contain(['Types']);
        $this->set('jobs',$jobs);
    }

}


