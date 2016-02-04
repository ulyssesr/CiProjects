<!DOCTYPE HTML>
<html lang="en-US">
<head>
<title>Flowers Schedule</title>
<meta charset="UTF-8">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Englebert' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?=base_url('css/flowers.css');?>"/>
<link rel="stylesheet" media="print" href="<?=base_url('css/flowersprint.css');?>"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url('js/add_bookmark.jquery.js');?>"></script>
</head>
<body>
<div id="main"> 
<h2><a href="<?=base_url('flowers');?>">Flowers Schedule</a></h2>
<p><?=anchor('flowers','Back to Calendar');?></p>
<table class="list">
<tr><th>Date</th><th>Name</th></tr>
<?php foreach ($query as $row): ?>
<tr><td><?php echo date('F j, Y', strtotime($row->date));?></td><td><?=anchor('flowers/name/'.url_title($row->data), $row->data)?></td></tr>
<?php endforeach; ?>
</table>
<p><?=anchor('flowers','Back To Calendar');?></p>
<p><?php if ($this->ion_auth->logged_in()) : 
echo 'Thank you for your service.<br/>';
echo 'If you are unable to bring flowers on your scheduled date,<br/>';
echo 'please contact Aurora Ronquillo at 510-304-6785.<br/>';
echo '<p>The flower schedule is available online at: <a href="http://uly.me/ci/flowers">http://uly.me/ci/flowers</a>.</p>';
endif; ?></p>
</div>
</body>
</html>
