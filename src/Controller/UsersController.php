<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController{
    public $name='Users';

    //A part of the cakephp user authentication controller
    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $this->Auth->allow('register');
    }

    /*
    *   Register a user
    */
    public function register(){

        //Register user data from register form
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('controller'=>'jobs','action'=>'index'));
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);

        $this->set('title', 'Register at JobFinder');
    }

}
