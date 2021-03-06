<?php echo $this->element('search'); ?>
<div id="category_block" class="col_12 column">
    <h5>Categories</h5>
    <ul>
        <?php foreach($categories as $category) : ?>
            <li><?php echo $this->HTML->link($category->name, array('action'=>'browse',$category->id));?></li>
        <?php endforeach; ?>
    </ul>
</div>
<br/>
<div class="col_12 column">
    <h5><?php echo $job->title;?>(<?php echo $job->city;?>,<?php echo $job->state;?>)</h5>
    <?php if($userId==$job->user_id): ?>
        <?php echo $this->HTML->link('Edit',array('action'=>'edit',$job->id));?> |
        <?php echo $this->Form->postLink('Delete',array('action'=>'delete',$job->id),array('confirm'=>'Are you sure?'));?>
    <?php endif; ?>
    <div class="type">
        <span style="background:<?php echo $job->type->color ?>"><?php echo $job->type->name;?></span>
    </div>
    <div class="description">
        <span id="list_date">
            <?php echo $this->Time->format($job->created); ?>
        </span>
        <?php echo $job->description;?>
        <p><strong>Contact At: <a href="#"></strong><?php echo $job->contact_email;?></a></p>
    </div>
    <br>
    <br>
</div>
<p><a href="<?php echo $this->request->webroot;?>jobs/browse">Back to Browse</a></p>


