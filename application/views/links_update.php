<h2>Links</h2>
<p>
<?php // display application menu ?>
<?=anchor('links','Home');?> | <?=anchor('links/edit','Edit');?> | <?=anchor('links/delete','Delete');?> | 
<?php if (!$this->ion_auth->logged_in()) : echo anchor('auth/login','Login'); else : echo anchor('auth/logout','Logout'); endif; ?>
<?php if (!$this->ion_auth->logged_in()) : else : ?>
</p>
<?php // display validation errors ?>
<div class="errors">
<?php echo validation_errors(); ?>
</div>
<?php // set variable options ?>
<?php foreach($query as $item):?>
<?php $url = array('name'=>'url','id'=>'url','value'=>$item->url,'size'=>'30');?>
<?php $anchor = array('name'=>'anchor','id'=>'anchor','value'=>$item->anchor,'size'=>'15');?>
<?php $tag = array('name'=>'tag','id'=>'tag','value'=>$item->tag,'size'=>'15');?>
<?php endforeach;?>
<?php // main form ?>
<?=form_open('links/save/'.$item->id, 'class="form-inline"');?>
Enter URL, Anchor, Tag<br/>
<?=form_input($url);?> 
<?=form_input($anchor);?> 
<?=form_dropdown('tag',$tags,$item->tag);?> 
<button type=submit class='btn' />Save</button>
<?=form_close();?>
<?php endif; ?>
<p>
<?php
// display categories or tags
echo "Category: ";
foreach($tagquery as $item):
 echo anchor('links/edit/'.$item->tag,ucwords($item->tag)); 
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
$answer.=anchor($item->url,$item->anchor,$new);
$answer.=', ';
endforeach;
$trimmed = rtrim($answer, ', ');
echo $trimmed;
echo '.';
?>
</p>