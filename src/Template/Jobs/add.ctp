<?php echo $this->Form->create('Jobs');?>
<fieldset>
    <?php
        echo $this->Form->input('title');
        echo $this->Form->input('company_name');
        echo $this->Form->input('category_id',array(
            'type'=>'select',
            'options'=>$categories,
            'empty'=>'Select Category'
        ));
        echo $this->Form->input('category_id',array(
            'type'=>'select',
            'options'=>$types,
            'empty'=>'Select Type'
        ));
        echo $this->Form->input('description',array(
            'type'=>'textarea',
        ));
        echo $this->Form->input('city');
        echo $this->Form->input('state');
        echo $this->Form->input('contact_email');
        echo $this->Form->submit('Add Job');
        echo $this->Form->end();
    ?>
</fieldset>
