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
            ->notEmpty('username', 'A user name is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('confirm_password', 'Confirm your password')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['Employer', 'Job Seeker']],
                'message' => 'Please enter a valid role'
            ])
            ->add('password', [
                'compare' => [
                    'rule' => ['compareWith', 'confirm_password'],
                    'message'=> 'Please enter matching passwords'
                ]
            ]);
    }

    // src/Model/Table/ArticlesTable.php

    public function isOwnedBy($articleId, $userId)
    {
        return $this->exists(['id' => $jobId, 'user_id' => $userId]);
    }
}
