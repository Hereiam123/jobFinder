<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class JobsTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsTo('Types');
        $this->belongsTo('Categories');
    }
}

?>
