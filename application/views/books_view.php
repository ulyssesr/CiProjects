<?php foreach($query as $item):?>
<p>
<?= anchor('books','Home');?> &middot; <?=anchor('books/view/'.$item->id,$item->bookname);?> &middot; 
<?= anchor('books/edit/'.$item->id, 'Edit')?> &middot;  
<?= anchor('books/delete/'.$item->id, 'Delete', array('onClick'=>"return confirm('Are you sure you want to delete record?')")); ?>
</p>
<table>
<tr><td><strong>Book:</strong></td><td><?= $item->bookname ?></td></tr>
<tr><td><strong>Author:</strong></td><td><?= $item->author ?></td></tr>
<tr><td><strong>Date Published:</strong></td><td><?= $item->datepublished ?></td></tr>
<tr><td><strong>Characters:</strong></td><td><?= $item->characters ?></td></tr>
<tr><td><strong>Recommended Reading:</strong></td><td><?= $item->recommended ?></td></tr>
<tr><td><strong>Store:</strong></td><td><?= $item->store ?></td></tr>
<tr><td><strong>Price:</strong></td><td><?= $item->price ?></td></tr>
<tr><td><strong>Borrower's Name:</strong></td><td><?= $item->borrowersname ?></td></tr>
<tr><td><strong>Borrowed Date:</strong></td><td><?= $item->borroweddate ?></td></tr>
<tr><td><strong>Synopsis:</strong></td><td style="width:500px;"><?= $item->synopsis ?></td></tr>
</table>
<?php endforeach;?>
