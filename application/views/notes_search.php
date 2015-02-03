<h2>Search</h2>
<div class="errors">
<?php echo validation_errors(); ?>
</div>
<?=form_open('notes/results','class="form-inline"');?>
<?php $options = array('name'=>'search','id'=>'','value'=>'','placeholder'=>'Enter search','size'=>'30');?>
<?=form_input($options);?> 
<button type=submit class='btn' />Search</button>
<?=form_close();?>