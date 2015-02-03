<h2>Edit Todo</h2>

<?php foreach ($query as $row): endforeach; ?>

<?php $todo = array('class'=>'todo form-inline','id'=>'todo');?>
<?php $tasks = array('name'=>'tasks','value'=>$row->tasks,'class'=>'span6 input-large');?>
<?php $onclick = array('onClick'=>"return confirm('Are you sure you want to delete record?')");?>

<?=form_open('todo/save/'.$row->id,$todo); ?>
<div class="control-group">
 <label class="control-label" for="tasks">Tasks:  
 <?=anchor('todo/insert','New'); ?> &middot; 
 <?=anchor('todo/delete/'.$row->id, 'Del', $onclick);?>
  <div class="controls"> 
   <?=form_input($tasks);?>
  </div> 
 </label>
</div> 

<div class="control-group radio_buttons">
 <label class="control-label" for="priority">Priority: </label>
 <label class="radio">
  <input class="radio_buttons inline" type='radio' name='priority' value='1' <?php if ($row->priority=='1') echo 'checked'; ?> />1 
 </label>
 <label class="radio">
  <input class="radio_buttons inline" type='radio' name='priority' value='2' <?php if ($row->priority=='2') echo 'checked'; ?> />2 
 </label>
 <label class="radio">
  <input class="radio_buttons inline" type='radio' name='priority' value='3' <?php if ($row->priority=='3') echo 'checked'; ?> />3 
 </label>
 <label class="radio">
  <input class="radio_buttons inline" type='radio' name='priority' value='4' <?php if ($row->priority=='4') echo 'checked'; ?> />4 
 </label>
 <label class="radio">
  <input class="radio_buttons inline" type='radio' name='priority' value='5' <?php if ($row->priority=='5') echo 'checked'; ?> />5 
 </label>
</div>
<div class="control-group">
 <div class="controls">
  <div class="errors"><?php echo validation_errors(); ?></div> 
  <button type=submit class='btn' />Save</button>
 </div>
</div>
<?=form_close();?>