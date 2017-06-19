<fieldset>
    <legend><?php echo __('Edit Job Listing'); ?></legend>
    <?php
        echo $this->Form->create($job);
        echo $this->Form->input('title');
        echo $this->Form->input('company_name');
        echo $this->Form->input('category_id',array(
            'type'=>'select',
            'options'=>$categories,
            'empty'=>'Select Category'
        ));
        echo $this->Form->input('user_id',array(
            'type'=>'hidden',
            'value'=>1
        ));
        echo $this->Form->input('type_id',array(
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
        echo $this->Form->input('user_id',array(
                    'type'=>'hidden',
                    'value'=>1
                ));
        echo $this->Form->submit('Edit Job');
        echo $this->Form->end();
    ?>
</fieldset>
