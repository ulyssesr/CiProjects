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
<?php
// setup array for the form below
foreach ($query as $row): 
	$startdate = array('id'=>'startdate','name'=>'startdate','value'=>$row->startdate,'size'=>'12');
	$enddate = array('id'=>'enddate','name'=>'enddate','value'=>$row->enddate,'size'=>'12');
	$name = array('name'=>'name','value'=>$row->name,'size'=>'40');
	$email = array('name'=>'email','value'=>$row->email,'size'=>'40');
endforeach;
$formopen = array('name'=>'ads');
$link = array(
   'name'  => 'link',
   'value' => $row->link,
   'class' => 'span6',
   'rows'   => '2'
	);
$type = array(
	'Sidebar Ads 1 Month'  => 'Sidebar Ads 1 Month',
	'Sidebar Ads 2 Months'  => 'Sidebar Ads 2 Months',
	'Sidebar Ads 3 Months'  => 'Sidebar Ads 3 Months',
	'Sidebar Ads 4 Months'  => 'Sidebar Ads 4 Months',
	'Sidebar Ads 6 Months'    => 'Sidebar Ads 6 Months',
	'Sidebar Ads 12 Months'   => 'Sidebar Ads 12 Months',
	'Single Post 4 Months' => 'Single Post 4 Months',
	'Single Post 6 Months' => 'Single Post 6 Months',
	'Single Post 12 Months' => 'Single Post 12 Months',
	'Header 4 Months' => 'Header 4 Months',
	'Header 6 Months' => 'Header 6 Months',
	'Header 12 Months' => 'Header 12 Months'
   );
$duration = array(
	'1 Month'  => '1 Month',
	'2 Months'  => '2 Months',
	'3 Months'  => '3 Months',
	'4 Months'  => '4 Months',
	'6 Months'    => '6 Months',
	'12 Months'   => '12 Months'
	);
$status = array(
	'Active'    => 'Active',
	'Expired'   => 'Expired'
	);	
?>
<div class="errors"><?php echo validation_errors(); ?></div>
<?=form_open('ads/save/'.$row->id, $formopen);?>
<div class="control-group">
<label class="control-label" for="priority">Link
<div class="controls">
<?=form_textarea($link);?>
</div>
</label>
</div> 
<label class="control-label" for="type">Type: </label><?php echo form_dropdown('type', $type, $row->type); ?>
<label class="control-label" for="duration">Duration: </label><?php echo form_dropdown('duration', $duration, $row->duration); ?>
<label class="control-label" for="startdate">Start Date: </label><?=form_input($startdate);?> Required 
<label class="control-label" for="enddate">End Date: </label><?=form_input($enddate);?> Required 
<label class="control-label" for="name">Name: </label><?=form_input($name);?> Required 
<label class="control-label" for="email">Email: </label><?=form_input($email);?> Required 
<label class="control-label" for="status">Status: </label><?php echo form_dropdown('status', $status, $row->status); ?>
<div class="control-group">
<div class="controls">
<button id="submit" type=submit class='btn' />Save</button>
</div>
</div>
<?=form_close();?>