<?php foreach ($query as $row): ?>
<?php $name = array('name'=>'name','value'=>$row->name,'size'=>'60'); ?>
<?php $telephone = array('name'=>'telephone','value'=>$row->telephone,'size'=>'60'); ?>
<?php $email = array('name'=>'email','value'=>$row->email,'size'=>'60'); ?>
<?php endforeach ?>
<?=form_open('sample/save/'.$row->id);?>
<p><label for="name">Name: </label><?=form_input($name);?></p>
<p><label for="telephone">Telephone: </label><?=form_input($telephone);?></p>
<p><label for="email">Email: </label><?=form_input($email);?></p>
<p><label for="notes">Notes: </label><?=form_textarea('notes',$row->notes);?></p>
<div class="submit">
<div class="errors"><?php echo validation_errors(); ?></div>
<p><input id="submit" type=submit value='Submit' /></p>
</div>
<?=form_close();?>