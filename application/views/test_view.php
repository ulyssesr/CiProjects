<!DOCTYPE html>
<html>
<head>
<title>Test</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
<link href="<?=base_url('assets/css/bootstrap-responsive.css');?>" rel="stylesheet">
<link href="<?=base_url('assets/css/style.css');?>" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<style>body {font-family:'Open Sans',sans-serif;}</style>
</head>
<body>
<div class="navbar">
<div class="navbar-inner">
<a class="brand" href="<?=base_url();?>">Dev Server</a>
</div>
</div>
<div class="container-fluid">
<div class="row">
<div class="span12">

<p>
<?php foreach ($record as $result):?>
<?=anchor('test/view/'.$result->id, $result->name);?>, <?=$result->address;?>, <?=$result->city;?>, <?=$result->group;?><br/>
<?php endforeach;?>
</p>

<?=form_open('test');?>
<?=form_dropdown('tag', $group, $result->group);?>
<?=form_close();?>

<?php print_r($group);?>

</div>
</div>
</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
</body>
</html>