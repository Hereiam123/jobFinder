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
            'order'=>array('Jobs.created'=>'desc'),
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

        $query=$this->Jobs->findById($id)->contain(['Types']);
        $job=$query->first();

        if(!$job){
            throw new NotFoundException(__('No job listing!'));
        }

        $this->set('title', 'Read More');

        $this->set('job',$job);
    }

    /*
    *   Add Job
    */
    public function add(){

        //Set categories
        $options=array(
            'order'=>array('Categories.name'=>'asc')
        );
        $categories=$this->Jobs->Categories->find('list',$options);
        $this->set('categories',$categories);

        //Set types
        $types=$this->Jobs->Types->find('list');
        $this->set('types',$types);

        //Save job data from add form
        if($this->request->is('post')){

            $job=$this->Jobs->newEntity($this->request->data);

            if($this->Jobs->save($job)){
                $this->Flash->set(__('Your job has been listed'));
                return $this->redirect(array('action'=>'index'));
            }
        }
        $this->set('title', 'Add Job');
    }

    /*
    *   Edit Job
    */
    public function edit($id=null){
        //Set categories
        $options=array(
            'order'=>array('Categories.name'=>'asc')
        );
        $categories=$this->Jobs->Categories->find('list',$options);
        $this->set('categories',$categories);

        //Set types
        $types=$this->Jobs->Types->find('list');
        $this->set('types',$types);

        $query=$this->Jobs->findById($id)->contain(['Types','Categories']);
        $job=$query->first();

        //Place job data into form for editing, save on edit
        if($this->request->is(['post','put'])){
            $job=$this->Jobs->patchEntity($job,$this->request->data);
            if ($this->Jobs->save($job)){
                    $this->Flash->success(__('Your job post has been updated.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to update your job post.'));
            }

        $this->set('job', $job);
        $this->set('title', 'Edit Job');
    }


    /*
    *   Delete Job
    */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $query = $this->Jobs->findById($id);
        $job=$query->first();

        if ($this->Jobs->delete($job)) {
            $this->Flash->success(__('Your job post has been deleted'));
            return $this->redirect(['action' => 'index']);
        }
    }
}

?>

