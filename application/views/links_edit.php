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
<button type=submit class='btn' />Save</button>
<?=form_close();?>
<p>
<?php
// display categories or tags
foreach($tagquery as $item):
// display tags (categories)
echo anchor('links/edit/'.$item->tag,ucwords($item->tag));
echo ' &middot; ';
endforeach;
?>
</p>
<p>
<?php
// main display
$answer = ''; 
foreach($query as $item):
$answer .= anchor('/links/update/'.$item->id,$item->anchor);
$answer .= ', ';
endforeach;
$trimmed = rtrim($answer, ', ');
echo $trimmed;
echo '.';
?>
</p>