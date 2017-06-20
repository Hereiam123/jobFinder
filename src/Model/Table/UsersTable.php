<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('first_name', 'First name is required')
            ->notEmpty('last_name', 'Last name is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('confirm_password', 'Confirm your password')
            ->sameAs('confirm_password','password','Passwords not equal')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['Employer', 'Job Seeker']],
                'message' => 'Please enter a valid role'
            ]);
    }
}
