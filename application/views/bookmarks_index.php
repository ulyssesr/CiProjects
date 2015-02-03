<h2>Bookmarks</h2>
<?php if (!$this->ion_auth->logged_in()):?>
<p>Some bookmarks worth sharing.</p>
<?php else:?>
<p>
<?=anchor('bookmarks/index','Home');?> &middot; 
<?=anchor('bookmarks/edit','Edit');?> &middot; 
<?=anchor('bookmarks/delete','Delete');?>
</p>
<?php endif;?>
<div class="errors">
<?php echo validation_errors(); ?>
</div>
<?php 
$url = array('name'=>'url','id'=>'url','value'=>'','placeholder'=>'http://','class'=>'span4 input-large');
$anchor = array('name'=>'anchor','id'=>'anchor','value'=>'','placeholder'=>'Anchor','class'=>'span4 input-large');
?>
<p><?php if (!$this->ion_auth->logged_in()):else:?></p>
<?=form_open('bookmarks/add', 'class="form-inline"');?>
Enter URL, Anchor, Tag: <br/>
<?=form_input($url);?> 
<?=form_input($anchor);?> 
<button type="submit" class="btn">Submit</button>
<?=form_close();?>
<?php endif;?>
<p><?php echo $this->pagination->create_links();?></p>
<?php $new = array('target'=>'_new','rel'=>'nofollow');?>
<table class="table table-striped">
<thead>
<tr><th>URL</th></tr>
</thead>
<tbody>
<?php foreach($query as $item) :?>
<tr><td><?=anchor($item->url,$item->anchor,$new);?></td></tr>
<?php endforeach;?>
</tbody>
</table>
<?php echo $this->pagination->create_links();?>