<div class="view">
<?php if (empty($query)) : redirect('notes'); endif;?>
<?php foreach($query as $item):?><?php endforeach;?>
<?php $title = url_title($item->filename,'dash',true);?>
<?php $this->template->set('title',$title);?>
<h2><?=ucwords($item->filename);?></h2>
<p>
<small class="muted"><?php echo date('F d, Y \a\t g:i a',$item->published);?>. 
<?php foreach($numbers as $number):;?>
<!--
<?php if ($number->numbers==0) : echo '0 comments.';?>
<?php elseif($number->numbers==1) : echo '1 comment.';?>
<?php else : echo $number->numbers. ' comments.';?>
<?php endif;?>
-->
<?php endforeach;?>
<?php if ($item->status == 'private'):?> [ private ]<?php endif;?>
<?php if (!$this->ion_auth->logged_in()) : else: ?>
 <?=anchor('notes/edit/'.$item->id, 'Edit')?>.
 <?=anchor('notes/delete/'.$item->id, 'Delete', array('onClick'=>"return confirm('Are you sure you want to delete record?')"));?>.
<?php endif;?>
</small>
</p>
<?=htmlspecialchars_decode($item->content);?>
<!--
<p>
<small>
<?php foreach($numbers as $number):;?>
<?php if ($number->numbers==0) : echo '<p>No comments yet.</p>';?>
<?php elseif($number->numbers==1) : echo '<p>One comment.</p>';?>
<?php else : echo '<p>' .$number->numbers. ' comments.</p>';?>
<?php endif;?>
<?php endforeach;?>
</small>
<small>
<?php $onclick = array('onClick'=>"return confirm('Are you sure you want to delete the comment?')");?>
<?php foreach($comments as $comment):?>
<?php echo date('n-d-Y. g:i a',$comment->timestamp);?>. 
<strong>[ <?=$comment->name;?> ]</strong>
<?=$comment->comment;?> 
<?php if (!$this->ion_auth->logged_in()) : else: ?>
<?=anchor('notes/editcomment/'.$item->id.'/'.$title.'/'.$comment->id, 'edit');?>  &middot; 
<?=anchor('notes/delcomment/'.$item->id.'/'.$title.'/'.$comment->id, 'del', $onclick);?>
<?php endif;?>
<br/>
<?php endforeach;?>
</small>
</p>
<div class="errors">
<?php echo validation_errors(); ?>
</div>
<?php
$formopen = array('class'=>'form-inline');
$name = array('name'=>'name','value'=>'','class'=>'form-inline');
$comment = array('name'=>'comment','value'=>'','rows'=>'3','cols'=>'120','class'=>'span5 input');
?>
<h4>Leave a comment ...</h4>
<?=form_open('notes/addcomment/'.$item->id.'/'.$title, $formopen);?>
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
<button type=submit class='btn' />Submit</button>
</div>
</div>
<?=form_close();?>
-->
</div>