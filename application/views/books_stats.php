<p>
<?= anchor('books/index/','Home'); ?> &middot; 
<?= anchor('books/author/','Author'); ?> &middot; 
<?= anchor('books/date/','Published Date'); ?> &middot; 
<?= anchor('books/stats/','Stats'); ?> &middot; 
<?= anchor('books/add/','Add Book'); ?>
</p>

<?=form_open('books/search', 'class="form-inline"');?>

<?php $search = array('name'=>'search','id'=>'','value'=>'','placeholder'=>'Enter Search','size'=>'25');?>
<?=form_input($search);?> 
<button type=submit class='btn' />Search</button>
<?=form_close();?>

<?php echo $this->pagination->create_links();?>

<?php $authorscount = $this->db->query('select distinct author from books where 1'); ?>

<table class="table table-striped">
<tbody>
<?php foreach($bookcount as $item):?>
 <tr><td><?= $item->booktotal; ?> Books</td><td><?= $authorscount->num_rows(); ?> Authors</td>
<?php endforeach;?>

<?php foreach($total as $item):?>
<td><?php echo 'Total: $'. number_format($item->price,2); ?></td></tr>
<?php endforeach;?>
</tbody>
</table>

<table class="table table-striped">
<thead>
<tr><th>Author</th><th>Books</th></tr>
</thead>
<tbody>
<?php foreach($query as $item):?>
<tr><td><?= anchor('books/bibliography/'.$item->id,$item->author); ?></td><td>(<?= $item->numberofbooks; ?>)</td></tr>
<?php endforeach;?>
</tbody>
</table>
