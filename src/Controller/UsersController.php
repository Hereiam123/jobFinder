<?php

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController{
    public $name='Users';

    /*
    *   Register a user
    */
    public function register(){
        //Register user data from register form
        if($this->request->is('post')){

            $user=$this->Users->newEntity($this->request->data);

            if($this->Users->save($user)){
                $this->Flash->set(__('Your have been registered'));
                return $this->redirect(array('action'=>'index'));
            }
        }

        $this->set('title', 'Register at JobFinder');
    }

}
