<h2>Search Results</h2>
<div class="errors">
<?php echo validation_errors(); ?>
</div>
<?php foreach($searchcount as $item):?>
<?php echo '<p>Search results: '.$item->searchcount.'</p>'; ?>
<?php endforeach;?>
<table class="table table-striped">
<tbody>
<?php foreach($query as $item):?>
<tr><td><?= anchor('notes/view/'.$item->id.'/'.url_title($item->filename,'dash',true),ucwords($item->filename));?>
<?php if ($item->status == 'private'):?><small class="muted"> - private</small><?php endif;?>
</td></tr>
<?php endforeach;?>
</tbody>
</table>
<?php echo $this->pagination->create_links();?>