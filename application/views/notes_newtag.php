<h2>New Tag</h2>
<div class="errors">
<?php echo validation_errors(); ?>
</div>
<?php $tag = array('name'=>'tag','id'=>'tag','value'=>'','placeholder'=>'Enter new tag','size'=>'20');?>
<?=form_open('notes/addtag', 'class="form-inline"');?>
Tag: <br/>
<?=form_input($tag);?> 
<button type=submit class='btn' />Add</button>
<?=form_close();?>
<table class="table table-striped">
<tbody>
<?php foreach($tagquery as $item):?>
<tr>
<td><?=ucwords($item->tag);?></td>
<td>
<?php $onclick = array('onClick'=>"return confirm('Are you sure you want to delete the comment?')"); ?>
<?=anchor('notes/edittag/'.$item->id,'Edit');?> &middot; 
<?=anchor('notes/deletetag/'.$item->id,'Del', $onclick);?>
</td>
</tr>
<?php endforeach;?>
</tbody>
</table>