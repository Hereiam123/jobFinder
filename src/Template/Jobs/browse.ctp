<div id="category_block">
    <ul>
        <?php foreach($categories as $category) : ?>
            <li><?php echo $this->HTML->link($category->name, array('action'=>'browse',$category->id));?></li>
        <?php endforeach; ?>
    </ul>
</div>

<h3>Latest Job Listings</h3>
<ul id="listings">
    <?php if(!$jobs->isEmpty()):?>
        <?php foreach($jobs as $job):?>
        <li>
            <div class="type">
                <span style="background:<?php echo $job->type->color ?>"><?php echo $job->type->name;?></span>
            </div>
            <div class="description">
                <h5><?php echo $job->title;?>(<?php echo $job->city;?>,<?php echo $job->state;?>)</h5>
                <span id="list_date">
                    <?php echo $this->Time->format($job->created); ?>
                </span>
                <?php echo $this->Text->truncate($job->description,250, array('ellipses'=>'...','exact'=>false));?>
                <?php echo $this->Html->link('Read More',array('controller'=>'jobs','action'=>'view',$job->id));?>
            </div>
        </li>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No jobs available</p>
    <?php endif;?>
</ul>
