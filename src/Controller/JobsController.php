<?php

namespace App\Controller;

use App\Controller\AppController;

class JobsController extends AppController{
    public $name='Jobs';

    /*
    *   Default Index Method
    */
    public function index(){
    
        $categories=$this->Jobs->Categories->find('all');
        $this->set('categories',$categories);

        //Set query options
        $options=array(
            'order'=>array('Jobs.created'=>'asc'),
            'limit'=>10
        );

        //Get job info
        $jobs = $this->Jobs->find('all',$options)->contain(['Types']);
        $this->set('jobs',$jobs);
    }

    /*
    *   Browse Jobs Method
    */
    public function browse($category=null){

        //Initialize conditions array
        $conditions=array();

        $categories=$this->Jobs->Categories->find('all');
        $this->set('categories',$categories);

        if($category!=null){
            //Match Category
            $conditions=array(
                'Jobs.category_id LIKE' => $category
            );
        }

        //Set query options
        $options = array(
            'order'=>array('Jobs.created'=>'desc'),
            'conditions'=>$conditions,
            'limit'=>8
        );

        //Get Jobs info
        $jobs = $this->Jobs->find('all',$options)->contain(['Types']);
        $this->set('jobs',$jobs);
    }
}

?>

