<?php foreach($query as $item):?><?php endforeach;?>
<?php $title = url_title($item->filename,'dash',true);?>
<?php $this->template->set('title',$title);?>
<?php foreach($comments as $comment):?><?php endforeach;?>

<h2>Edit comment ...</h2>

<div class="errors">
<?php echo validation_errors(); ?>
</div>

<?php
$formopen = array('class'=>'form-inline');
$name = array('name'=>'name','value'=>$comment->name,'class'=>'form-inline');
$comment = array('name'=>'comment','value'=>$comment->comment,'rows'=>'3','cols'=>'120','class'=>'span5 input');
?>

<?=form_open('notes/savecomment/'.$item->id.'/'.$title.'/'.$this->uri->segment(5), $formopen);?>
<?=form_hidden('notesid', $this->uri->segment(3));?>
<div class="control-group">
<label class="control_label" for="name">Name: </label>
<div class="controls">
<?=form_input($name);?>
</div>
<label class="control-label" for="priority">Comment: </label>
<div class="controls">
<?=form_textarea($comment);?>
</div>
</div> 
<div class="control-group">
<div class="controls"> 
<button type=submit class='btn' />Save</button>
</div>
</div>
<?=form_close();?>
