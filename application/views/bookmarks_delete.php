<h2>Bookmarks</h2>
<p>Choose bookmark to <strong>DELETE</strong></p>
<div class="errors">
<?php echo validation_errors(); ?>
</div>
<p><?php echo $this->pagination->create_links();?></p>
<?php $onclick = array('onClick'=>"return confirm('Are you sure you want to delete record?')");?>
<table class="table table-striped">
<thead>
<tr><th>URL</th></tr>
</thead>
<tbody>
<?php foreach($query as $item) :?>
<tr><td><?=anchor('bookmarks/del/'.$item->id,$item->anchor,$onclick);?></td></tr>
<?php endforeach;?>
</tbody>
</table>
<?php echo $this->pagination->create_links();?>