<h3>Create User</h3>
<p>Please enter the users information below.</p>
<p><?php echo $message;?></p>
<?php echo form_open("auth/create_user");?>
<p>
<label for="firstname">First Name: </label>
<?php echo form_input($first_name);?>
</p>
<p>
<label for="last_name">Last Name: </label>
<?php echo form_input($last_name);?>
</p>
<p>
<label for="company">Company: </label>
<?php echo form_input($company);?>
</p>
<p><label for="email">Email: </label>
<?php echo form_input($email);?>
</p>
<p><label for="phone">Phone: </label>
<?php echo form_input($phone1);?>-<?php echo form_input($phone2);?>-<?php echo form_input($phone3);?>
</p>
<p><label for="password">Password: </label>
<?php echo form_input($password);?>
</p>
<p><label for="password_confirm">Password: </label>
<?php echo form_input($password_confirm);?>
</p>
<p><?php echo form_submit('submit', 'Create User');?></p>
<?php echo form_close();?>