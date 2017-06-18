<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('kickstart.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('kickstart.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div id="container" class="grid">
        <header>
            <div class="col_6 column">
                <h2><strong><a href="<?php echo $this->request->webroot; ?>" id="logo">JobFinder</a></strong></h2>
            </div>
            <div class="col_6 column right">
                <form id="add-job" action="<?php echo $this->request->webroot;?>jobs/add">
                    <button class="large green"><i class="fa fa-paper-plane" aria-hidden="true"> Add Job</i></button>
                </form>
            </div>
        </header>
        <div class="col_12 column">
        <!-- Menu Horizontal -->
            <ul class="menu">
                <li <?php echo ($this->request->here=='/jobFinder/' || $this->request->here=='/jobFinder/jobs') ? 'class="current"' : ''?>><a href="<?php echo $this->request->webroot;?>"><i class="fa fa-home" aria-hidden="true"> Home</i></a></li>
                <li <?php echo ($this->request->here=='/jobFinder/jobs/browse') ? 'class="current"' : ''?>><a href="<?php echo $this->request->webroot;?>jobs/browse"><i class="fa fa-wrench"> Browse Jobs</i></a></li>
                <li <?php echo ($this->request->here=='/jobFinder/users/register') ? 'class="current"' : ''?>><a href="<?php echo $this->request->webroot;?>users/register"><i class="fa fa-cog"></i> Register</a></li>
                <li <?php echo ($this->request->here=='/jobFinder/users/login') ? 'class="current"' : ''?>><a href="<?php echo $this->request->webroot;?>users/login"><i class="fa fa-key"></i> Login</a></li>
            </ul>
        </div>
        <div class="col_12 column">
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        <div class="clearfix"></div>
        <footer>
            <p>Copyright 2017, JobFinder, All Rights Reserved</p>
        </footer>
    </div> <!-- End Grid -->
</body>
</html>
