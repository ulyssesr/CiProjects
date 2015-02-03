<h2>Ads</h2>
<?php foreach ($query as $row): ?>
<?php $onclick = array('onClick'=>"return confirm('Are you sure you want to delete record?')"); ?>
<?=anchor('ads','Home'); ?> | 
<?=anchor('ads/edit/'.$row->id,'Edit'); ?> |  
<?=anchor('ads/delete/'.$row->id, 'Del', $onclick); ?> | 
<?=anchor('ads/activate/'.$row->id,'Activation Email'); ?> | 
<?=anchor('ads/reminder/'.$row->id,'Reminder Email'); ?> |  
<?=anchor('ads/expiring/'.$row->id,'Expiring Email'); ?>
<p>
<table class="table table-striped">
<thead><tr><th>Row</th><th>Description</th></tr></thead>
<tbody>
<tr><td>Link: </td><td><?=$row->link;?></td></tr>
<tr><td>Type: </td><td><?=$row->type;?></td></tr>
<tr><td>Start Date: </td><td><?=$row->startdate;?></td></tr>
<tr><td>End Date: </td><td><?=$row->enddate;?></td></tr>
<tr><td>Duration: </td><td><?=$row->duration;?></td></tr>
<tr><td>Name: </td><td><?=$row->name;?></td></tr>
<tr><td>Email: </td><td><?=$row->email;?></td></tr>
<tr><td>Status: </td><td><?=$row->status;?></td></tr>
</tbody>
</table>
</p>
<?php endforeach; ?>