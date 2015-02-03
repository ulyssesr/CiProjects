<h2>Login</h2>
<?php echo $message;?>
<?php echo form_open('auth/login');?>
<label class="control-label" for="identity">Email:</label>
<?php echo form_input($identity);?>
<label class="control-label" for="password">Password:</label>
<?php echo form_input($password);?>
<label class="checkbox" for="remember">
<?php echo form_checkbox('remember', '1', FALSE);?> Remember me
</label>
<div class="control-group">
<div class="controls">
<button type="submit" class="btn">Login</button>
</div>
</div> 
<?php echo form_close();?>