<h2>Links</h2>
<?php if (!$this->ion_auth->logged_in()) : else : ?>
<p><?=anchor('links/index','Home');?> &middot; <?=anchor('links/edit','Edit');?> &middot; <?=anchor('links/delete','Delete');?></p>
<div class="errors">
 <?php echo validation_errors(); ?>
</div>
<?php $url = array('name'=>'url','id'=>'url','value'=>'','placeholder'=>'http://','size'=>'20');?>
<?php $anchor = array('name'=>'anchor','id'=>'anchor','value'=>'','placeholder'=>'Anchor','size'=>'10');?>
<?=form_open('links/add', 'class="form-inline"');?>
Enter URL, Anchor, Tag<br/>
<?=form_input($url);?> 
<?=form_input($anchor);?> 
<?=form_dropdown('tag',$tags);?> 
<button type=submit class='btn' />Add</button>
<?=form_close();?>
<?php endif; ?>
<p>
<?php
// display categories or tags
foreach($tagquery as $item):
 echo anchor('links/tag/'.$item->tag,ucwords($item->tag));
 echo ' &middot; ';  
endforeach;
?>
</p>
<p>
<?php
// main display
$new = array('target'=>'_new','rel'=>'nofollow');
$answer = ''; 
foreach($query as $item):
$answer .= anchor($item->url,$item->anchor,$new);
$answer .= ', ';
endforeach;
$trimmed = rtrim($answer, ', ');
echo $trimmed;
echo '.';
?>
</p>