<p>
<?=anchor('books','Home');?> &middot; 
<?= anchor('books/author/','Author'); ?> &middot; 
<?= anchor('books/date/','Published Date'); ?> &middot; 
<?= anchor('books/stats/','Stats'); ?> &middot; 
<?= anchor('books/add/','Add Book'); ?>
</p>

<?
$bookname = array('name'=>'bookname','id'=>'','value'=>'','class'=>'span4 input-large');
$author = array('name'=>'author','id'=>'','value'=>'','class'=>'span4 input-large');
$datepublished = array('name'=>'datepublished','id'=>'','value'=>'','class'=>'span4 input-large');
$characters = array('name'=>'characters','id'=>'','value'=>'','class'=>'span4 input-large');
$recommended = array('name'=>'recommended','id'=>'','value'=>'','class'=>'span4 input-large');
$store = array('name'=>'store','id'=>'','value'=>'','class'=>'span4 input-large');
$price = array('name'=>'price','id'=>'','value'=>'','class'=>'span4 input-large');
$borrowersname = array('name'=>'borrowersname','id'=>'','value'=>'','class'=>'span4 input-large');
$borroweddate = array('name'=>'borroweddate','id'=>'','value'=>'','class'=>'span4 input-large');
$synopsis = array('name'=>'synopsis','id'=>'synopsis','value'=>'','rows'=>'35','cols'=>'120','width'=>'100');
?>

<div class="errors">
<?php echo validation_errors(); ?>
</div>

<?=form_open('books/insert/', 'class="form-horizontal"');?>
<div class="control-group">
 <label class="control-label" for="bookname">Book:</label>
 <div class="controls">
  <?=form_input($bookname);?>
 </div>
</div>
<div class="control-group"> 
 <label class="control-label" for="author">Author:</label>
 <div class="controls">
  <?=form_input($author);?>
 </div>
</div> 
<div class="control-group"> 
 <label class="control-label" for="datepublished">Date Published:</label>
 <div class="controls">
  <?=form_input($datepublished);?><span style="color:#999;"> Format: YYYY-MM-DD</span>
 </div>
</div>
<div class="control-group">  
 <label class="control-label" for="characters">Characters:</label>
 <div class="controls">
  <?=form_input($characters);?>
 </div>
</div>
<div class="control-group">  
 <label class="control-label" for="recommended">Recommended Reading:</label>
 <div class="controls">
  <?=form_input($recommended);?>
 </div>
</div> 
<div class="control-group">  
 <label class="control-label" for="store">Store:</label>
 <div class="controls">
  <?=form_input($store);?>
 </div>
</div>
<div class="control-group">  
 <label class="control-label" for="price">Price:</label>
 <div class="controls">
  <?=form_input($price);?><span style="color:#999;"> Format: 0.00</span>
 </div>
</div> 
<div class="control-group">  
 <label class="control-label" for="borrowersname">Borrowers Name:</label>
 <div class="controls">
  <?=form_input($borrowersname);?>
 </div>
</div> 
<div class="control-group">  
 <label class="control-label" for="borroweddate">Borrowed Date:</label>
 <div class="controls">
  <?=form_input($borroweddate);?><span style="color:#999;"> Format: YYYY-MM-DD</span>
 </div>
</div> 
<div class="control-group">  
 <label class="control-label" for="recommended">Recommended Reading:</label>
 <div class="controls">
  <?=form_input($recommended);?>
 </div>
</div> 
<div class="control-group">  
 <label class="control-label" for="synopsis">Synopsis:</label>
 <div class="controls">
  <?=form_textarea($synopsis);?>
 </div>
</div> 
<div class="control-group">  
 <div class="controls">
  <button type="submit" class="btn">Save</button>
 </div>
</div>  
<?=form_close();?>