<h2>Todo</h2>

<table class="table table-striped">

<p>Tasks:
<?php if (!$this->ion_auth->logged_in()): else:?> 
<?=anchor('todo/insert','New');?>
<?php endif;?>
</p>

<tbody>
<?php foreach ($query as $row): ?>
<tr><td width="20"><?=$row->priority?></td><td><?=anchor('todo/edit/'.$row->id,$row->tasks);?></td></tr>
<?php endforeach ?>
</tbody>
</table>

<?php echo $this->pagination->create_links();?>