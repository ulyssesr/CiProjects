<p><?=anchor('contacts','Home'); ?> | <?=anchor('contacts/add','New'); ?></p>
<?php echo $this->pagination->create_links();?>
<?php foreach ($query as $row): ?>
<?=anchor('contacts/view/'.$row->id,$row->name);?><br/>
<?php endforeach ?>