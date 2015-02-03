<h2>Notes</h2>
<?php foreach($query as $item):?>
<article>
<h3><?= anchor('notes/view/'.$item->id.'/'.url_title($item->filename,'dash',true),ucwords($item->filename));?></h3>
<p><small class="muted">
<?php echo date('F d, Y \a\t g:i a. ',$item->published); ?>
<?php 
if ($item->comments == 0) : 
	echo $item->comments.' comments. ';
elseif ($item->comments == 1) : 
	echo $item->comments.' comment. ';
else: 
	echo $item->comments.' comments. ';
endif;
?>
<?php if ($item->status == 'private'): echo '[ private ]'; endif; ?>
</small></p>
<?php echo '<p>'.$item->content.'</p>'; ?>
</article>
<?php endforeach;?>
<div class="pagination">
<?php echo $this->pagination->create_links();?>
</div>