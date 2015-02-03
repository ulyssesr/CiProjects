<h2>Ads</h2>
<p>
<?=anchor('ads','Home'); ?> | 
<?=anchor('ads/insert','New'); ?> | 
<?=anchor('ads/startdate','Start Date'); ?> | 
<?=anchor('ads/enddate','End Date'); ?> | 
<?=anchor('ads/active','Active'); ?> | 
<?=anchor('ads/due','Due'); ?> | 
<?=anchor('ads/expired','Expired'); ?>  
</p>
<table class="table table-striped">
<thead>
<tr><th>Link</th><th>Type</th><th>Start Date</th><th>End Date</th><th>Duration</th><th>Website</th></tr>
</thead>
<tbody>
<?php foreach ($query as $row): ?>
<tr>
<td><?=anchor('ads/view/'.$row->id,'view');?></td>
<td><?=$row->type;?></td>
<td><?=$row->startdate;?></td>
<td><?=$row->enddate;?></td>
<td><?=$row->duration;?></td>
<td><?=$row->link;?></td>
</tr>
<?php endforeach ?>
</tbody>
</table>
<?php echo $this->pagination->create_links();?>