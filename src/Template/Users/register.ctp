<?php echo $this->Flash->render('auth') ?>
<?php echo $this->Form->create($user);?>
<fieldset>
    <legend><?php echo __('Register to Jobfinder'); ?></legend>
    <?php
        echo $this->Form->input('first_name');
        echo $this->Form->input('last_name');
        echo $this->Form->input('username');
        echo $this->Form->input('password',array(
            'type'=>'password'
        ));
        echo $this->Form->input('confirm_password',array(
            'type'=>'password'
        ));
        echo $this->Form->input('email',array(
            'type'=>'email'
        ));
        echo $this->Form->input('role',array(
            'type'=>'select',
            'options'=>array('Employer'=>'Employer','Job Seeker'=>'Job Seeker'),
            'empty'=>'Select Role'
        ));
        echo $this->Form->submit('Register');
        echo $this->Form->end();
    ?>
</fieldset>
