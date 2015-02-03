<h2>Add Todo</h2>

<div class="errors"><?php echo validation_errors(); ?></div>

<?php $todo = array('class'=>'todo form-inline','id'=>'todo');?>
<?php $tasks = array('name'=>'tasks','value'=> (!empty($_POST['tasks']) ? $_POST['tasks'] : '') ,'class'=>'span6 input-large'); ?>
<?php $priority = array('name'=>'priority','size'=>'60'); ?>

<?=form_open('todo/insert',$todo);?>
<?=form_hidden('id', $this->uri->segment(3));?>
<div class="control-group">
 <label class="control-label" for="tasks">Tasks:
  <div class="controls"> 
   <?=form_input($tasks);?>
  </div>
 </label>
</div> 
<div class="control-group radio_buttons">
 <label class="control-label" for="priority">Priority: </label>
 <label class="radio">
  <input class="radio_buttons inline" type='radio' name='priority' value='1' <?php if (!empty($_POST['priority'])) { if ($_POST['priority']==1) { echo 'checked'; } else { echo ''; }} ?> />1 
 </label>
 <label class="radio">
  <input class="radio_buttons inline" type='radio' name='priority' value='2' <?php if (!empty($_POST['priority'])) { if ($_POST['priority']==2) { echo 'checked'; } else { echo ''; }} ?> />2 
 </label>
 <label class="radio">
  <input class="radio_buttons inline" type='radio' name='priority' value='3' <?php if (!empty($_POST['priority'])) { if ($_POST['priority']==3) { echo 'checked'; } else { echo ''; }} ?>/>3 
 </label>
 <label class="radio">
  <input class="radio_buttons inline" type='radio' name='priority' value='4' <?php if (!empty($_POST['priority'])) { if ($_POST['priority']==4) { echo 'checked'; } else { echo ''; }} ?>/>4  
 </label>
 <label class="radio">
  <input class="radio_buttons inline" type='radio' name='priority' value='5' <?php if (!empty($_POST['priority'])) { if ($_POST['priority']==5) { echo 'checked'; } else { echo ''; }} ?>/>5 
 </label>
</div>  
<div class="control-group">
 <div class="controls">
  <button type=submit class='btn' />Save</button>
 </div>
</div>
<?=form_close();?>