<h2>Bookmarks</h2>
<div class="errors">
<?php echo validation_errors(); ?>
</div>
<?php 
foreach($query as $item) :
$url = array('name'=>'url','id'=>'url','value'=>$item->url,'class'=>'span4 input-large');
$anchor = array('name'=>'anchor','id'=>'anchor','value'=>$item->anchor,'class'=>'span4 input-large');
endforeach;
?>
<?=form_open('bookmarks/save/'.$item->id, 'class="form-inline"');?>
Enter URL, Anchor & Tag.<br/>
<?=form_input($url);?> 
<?=form_input($anchor);?> 
<button type="submit" class="btn">Save</button>
<?=form_close();?>
<?php
//$new = array('target'=>'_new','rel'=>'nofollow');
//$answer = '';
//foreach($query as $item) :
//$answer .= anchor($item->url,$item->anchor,$new);
//$answer .= ", ";  
//endforeach;
//$trimmed = rtrim($answer, ', ');
//echo $trimmed;
//echo '.';
?>