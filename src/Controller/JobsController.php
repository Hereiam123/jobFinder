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

        $this->set('title', 'JobFinder');

        $this->set('jobs',$jobs);
    }

    /*
    *   Browse Jobs Method
    */
    public function browse($category=null){

        //Initialize conditions array
        $conditions=array();

        //check keywords
        if($this->request->is('post')){
            if(!empty($this->request->data('keywords'))){
                $conditions[]=array('OR'=>array(
                    'Jobs.title LIKE' => "%".$this->request->data('keywords')."%",
                    'Jobs.description LIKE' => "%".$this->request->data('keywords')."%"
                    )
                );
            }

            //State filter
            if(!empty($this->request->data('state')) && $this->request->data('state')!='Select State'){
                $conditions[]=array(
                    'Jobs.state LIKE' => "%".$this->request->data('state')."%"
                );
            }

            //Category filter
            if(!empty($this->request->data('category')) && $this->request->data('category')!='Select Category'){
                $conditions[]=array(
                    'Jobs.category_id LIKE' => $this->request->data('category')
                );
            }
        }

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

        $this->set('title', 'Browse Jobs');

        $this->set('jobs',$jobs);
    }

    /*
    *   Read more for a single job
    */
    public function view($id){
        $categories=$this->Jobs->Categories->find('all');
        $this->set('categories',$categories);

        if(!$id){
            throw new NotFoundException(__('No job listing!'));
        }

        $job=$this->Jobs->findById($id)->contain(['Types']);

        if(!$job){
            throw new NotFoundException(__('No job listing!'));
        }

        $this->set('title', 'Read More');

        $this->set('job',$job);
    }
}

?>

