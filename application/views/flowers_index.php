<!DOCTYPE HTML>
<html lang="en-US">
<head>
<title>Flowers Schedule</title>
<meta charset="UTF-8">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Englebert' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?=base_url('css/flowers.css');?>"/>
<link rel="stylesheet" href="<?=base_url('css/flowersprint.css');?>" media="print" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head>
<body>
<div id="main">
<h2><a href="<?=base_url('flowers');?>">Flowers Schedule</a></h2>
<p>
<?=anchor('flowers','Current Month');?> | 
<?=anchor('flowers/schedule','Display Schedule');?> | 
<?php if (!$this->ion_auth->logged_in()) : echo anchor('/auth/login','Login'); else: echo anchor('/auth/logout','Logout'); endif; ?>
</p>
<?php echo $flowers; ?>
<p>Copyright &copy; <?php echo date('Y');?>.</p> 
</div>
<?php if ($this->ion_auth->logged_in()) : ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.calendar .day').click(function() {
			day_num = $(this).find('.day_num').html();
			if (day_num != null) {				
				day_data = prompt('Enter Name', $(this).find('.content').html());
				if (day_data != null) {
					$.ajax({
						url: window.location,
						type: 'POST',
						data: {
							day: day_num,
							data: day_data
						},
						success: function(msg) {
							location.reload();
						}
					});
				}
			}	
		});
	});
</script>
<?php endif; ?>
</body>
</html>
