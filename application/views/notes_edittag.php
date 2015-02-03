<h2>Edit Tag</h2>
<?php foreach($tagquery as $item):?><?php endforeach;?>
<div class="errors">
<?php echo validation_errors(); ?>
</div>
<?php $tag = array('name'=>'tag','id'=>'tag','value'=> $item->tag,'placeholder'=>'Enter new tag','size'=>'20');?>
<?=form_open('notes/savetag/'.$item->id, 'class="form-inline"');?>
Tag: <br/>
<?=form_input($tag);?> 
<button type=submit class='btn' />Save</button>
<?=form_close();?>
<table class="table table-striped">
<tbody>
<tr><td><?= anchor('notes/edittag/'.$item->id,ucwords($item->tag));?></td></tr>
</tbody>
</table>