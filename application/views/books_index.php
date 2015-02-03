<p>
<?= anchor('books/index/','Home'); ?> &middot; 
<?= anchor('books/author/','Author'); ?> &middot; 
<?= anchor('books/date/','Published Date'); ?> &middot; 
<?= anchor('books/stats/','Stats'); ?> &middot; 
<?= anchor('books/add/','Add Book'); ?>
</p>

<?=form_open('books/search', 'class="form-inline"');?>
<?php $search = array('name'=>'search','id'=>'','value'=>'','placeholder'=>'Enter Search','size'=>'25');?> 
<div class="control-group">
 <div class="controls">
  <?=form_input($search);?> 
  <button type=submit class='btn' />Search</button>
 </div>
</div>  
<?=form_close();?>

<p><?php echo $this->pagination->create_links();?></p>

<?php if ($_POST): ?> 
<?php foreach($searchcount as $item): ?>
<?php echo '<p>Search results: '.$item->searchcount.'</p>'; ?>
<?php endforeach;?>
<?php endif;?>
<div class="errors"><?php echo validation_errors(); ?></div>
<table class="table table-striped">
<thead>
<tr><th>ID</th><th>Book</th><th>Author</th><th>Published</th><th>Price</th></tr>
</thead>
<tbody>
<?php foreach($query as $item):?>
<tr>
<td><?= $item->id ?></td>
<td><?= anchor('books/view/'.$item->id,$item->bookname); ?></td>
<td><?= anchor('books/bibliography/'.$item->id,$item->author); ?></td>
<td><?= $item->datepublished ?></td>
<td><?= $item->price ?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
