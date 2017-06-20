<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController{
    public $name='Users';

    //A part of the cakephp user authentication controller
    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $this->Auth->allow(['register','logout']);
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
                $this->Flash->success(__('You are now registered.'));
                return $this->redirect(array('controller'=>'jobs','action'=>'index'));
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
        $this->set('title', 'Register at JobFinder');
    }

    /*
    *   Login user
    */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        $this->set('title', 'Login to your account.');
    }

    /*
    *   Logout User
    */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
