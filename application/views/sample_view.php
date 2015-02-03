<?php foreach ($query as $row): ?>
<?php $onclick = array('onClick'=>"return confirm('Are you sure you want to delete record?')"); ?>
<p><?=anchor('sample/edit/'.$row->id,'Edit'); ?> &middot; <?=anchor('sample/delete/'.$row->id, 'Del', $onclick); ?></p>
<?=$row->name;?><br/>
<?=$row->telephone;?><br/>
<?=$row->email;?><br/>
<?=$row->notes;?><br/>
<?php endforeach; ?>