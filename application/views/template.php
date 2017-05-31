<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title><?=$title?> &mdash; uly.me &mdash; Ulysses Ronquillo</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" media="screen"/>
<link href="<?=base_url('assets/css/bootstrap-responsive.css');?>" rel="stylesheet"/>
<link href="<?=base_url('assets/css/style.css');?>" rel="stylesheet"/>
<link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script src="<?=base_url('ckeditor/ckeditor.js');?>"></script>
<script>
$(function() { $( "#startdate" ).datepicker({dateFormat: 'yy-mm-dd'});});
$(function() { $( "#enddate" ).datepicker({dateFormat: 'yy-mm-dd'});});
</script>
</head>
<body>
<div id="wrap">
<div class="navbar navbar-inverse navbar-fixed-top">
<div class="navbar-inner">
<div class="container">
<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="brand" href="<?=base_url('');?>">Uly.me</a>
<div class="nav-collapse collapse">
<ul class="nav">
<li <?php if($nav=='links'):echo 'class="active"';endif;?>><a href="<?=base_url('links');?>">Links</a></li>

<li class="dropdown">
<a href="<?=base_url('notes');?>" class="dropdown-toggle" data-toggle="dropdown">Notes <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><?=anchor('notes',ucwords("Home"));?></li>
<?php if($nav=='notes'):?>
<?php foreach($tagquery as $item):?>
<li><?=anchor('notes/tag/'.$item->id,ucwords($item->tag));?></li>
<?php endforeach;?>
<li class="divider"></li>
<li><?=anchor('notes/create', 'New');?></li>
<li><?=anchor('notes/newtag', 'Tag');?></li>
<li class="divider"></li>
<li><?=anchor('notes/search', 'Search');?></li>
<?php endif;?>
</ul>
</li>

<li <?php if($nav=='bookmarks'):echo 'class="active"';endif;?>><a href="<?=base_url('bookmarks');?>">Bookmarks</a></li>
<li <?php if($nav=='todo'):echo 'class="active"';endif;?>><a href="<?=base_url('todo');?>">Todo</a></li>
<li <?php if($nav=='ads'):echo 'class="active"';endif;?>><a href="<?=base_url('ads');?>">Ads</a></li>
<?php if ($this->ion_auth->logged_in()):?>
<li><?=anchor('auth/logout', 'Logout');?></li>
<?php else:?>
<li><?=anchor('notes/login', 'Login');?></li>
<?php endif;?>
</ul>
</div><!--/.nav-collapse -->
</div><!--/.container -->
</div><!--/.navbar-inner -->
</div><!--/.navbar navbar-inverse navbar-fixed-top -->
<div class="content">
<div class="container">
<div class="row">
<div class="span12">
<?=$contents;?>
</div><!--/.span12 -->
</div><!--/.row -->
</div><!--/.container -->
</div><!--/.content --> 
<div id="push"></div>
</div><!--/.wrap -->
<footer>
<div class="container">
<small>Copyright &copy; <?=date('Y');?>. All rights reserved.</small>
</div><!--/.container --> 
</footer>
<script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
</body>
</html>