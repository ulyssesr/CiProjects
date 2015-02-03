<p><?=anchor('sample/insert','New'); ?></p>
<?php echo $this->pagination->create_links();?>
<?php foreach ($query as $row): ?>
<?=anchor('sample/view/'.$row->id,$row->name);?><br/>
<?php endforeach ?>