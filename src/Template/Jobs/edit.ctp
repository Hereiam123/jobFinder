<?php echo $this->Form->create('Jobs');?>
<fieldset>
    <legend><?php echo __('Edit Job Listing'); ?></legend>
    <?php
        echo $this->Form->input('title',array(
            'value'=>$job->title
        ));
        echo $this->Form->input('company_name',array(
            'value'=>$job->company_name,
        ));
        echo $this->Form->input('category_id',array(
            'type'=>'select',
            'options'=>$categories,
            'selected'=>$job->category,
            'empty'=>'Select Category'
        ));
        echo $this->Form->input('user_id',array(
            'type'=>'hidden',
            'value'=>1
        ));
        echo $this->Form->input('type_id',array(
            'type'=>'select',
            'options'=>$types,
            'selected'=>$job->type,
            'empty'=>'Select Type'
        ));
        echo $this->Form->input('description',array(
            'type'=>'textarea',
            'value'=>$job->description
        ));
        echo $this->Form->input('city',array(
            'value'=>$job->city
        ));
        echo $this->Form->input('state',array(
           'value'=>$job->state
        ));
        echo $this->Form->input('contact_email',array(
           'value'=>$job->contact_email
        ));
        echo $this->Form->submit('Add Job');
        echo $this->Form->end();
    ?>
</fieldset>
