<h2>Links</h2>
<p>
<?php // display application menu ?>
<?=anchor('links','Home');?> &middot; 
<?=anchor('links/edit','Edit');?> &middot; 
<?=anchor('links/delete','Delete');?>
</p>
<?php // display validation errors ?>
<div class="errors">
<?php echo validation_errors(); ?>
</div>
<?php // set variable options ?>
<?php $url = array('name'=>'url','id'=>'url','value'=>'','placeholder'=>'http://','size'=>'30');?>
<?php $anchor = array('name'=>'anchor','id'=>'anchor','value'=>'','placeholder'=>'Anchor','size'=>'15');?>
<?php $tag = array('name'=>'tag','id'=>'tag','value'=>'','placeholder'=>'Tag','size'=>'15');?>
<?php // main form ?>
<?=form_open('links/add', 'class="form-inline"');?>
Enter URL, Anchor, Tag<br/>
<?=form_input($url);?>  
<?=form_input($anchor);?>  
<?=form_dropdown('tag',$tags);?> 
<button type=submit class='btn' />Add</button>
<?=form_close();?>
<p>
<?php
// display categories or tags
foreach($tagquery as $item):
echo anchor('links/delete/'.$item->tag,ucwords($item->tag));
echo ' &middot ';
endforeach;
?>
</p>
<p>
<?php 
// main display
$blank = array('target'=>'_blank');
$onclick = array('onClick'=>"return confirm('Are you sure you want to delete record?')");
$answer = '';
foreach($query as $item):
$answer.= anchor('links/del/'.$item->id, $item->anchor, $onclick);
$answer.= ', ';
endforeach;
$trimmed = rtrim($answer, ', ');
echo $trimmed;
echo '.';
?>
</p>