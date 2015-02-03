<h2>Bookmarks</h2>
<p>Choose bookmark to <strong>EDIT</strong></p>
<p><?php echo $this->pagination->create_links();?></p>
<table class="table table-striped">
<thead>
<tr><th>URL</th></tr>
</thead>	
<tbody>
<?php foreach($query as $item) :?>
<tr><td><?=anchor('bookmarks/update/'.$item->id,$item->anchor);?></td></tr>
<?php endforeach;?>
</tbody>
</table>
<?php echo $this->pagination->create_links();?>