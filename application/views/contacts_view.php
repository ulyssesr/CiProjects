<?php foreach ($query as $row): ?>
<?php $onclick = array('onClick'=>"return confirm('Are you sure you want to delete record?')"); ?>
<p>
<?=anchor('contacts','Home'); ?> | <?=anchor('contacts/add','New'); ?> | 
<?=anchor('contacts/edit/'.$row->id,'Edit'); ?> | <?=anchor('contacts/delete/'.$row->id, 'Del', $onclick); ?>
</p>
<?=$row->name;?><br/>
<?=$row->telephone;?><br/>
<?=$row->email;?><br/>
<?=$row->notes;?><br/>
<?php endforeach; ?>
