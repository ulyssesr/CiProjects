<h3>Forgot Password</h3>

<p>Please enter your email address so we can send you an email to reset your password.</p>

<p><?php echo $message;?></p>

<?php echo form_open("auth/forgot_password");?>

<p>Email Address:<br />
<?php echo form_input($email);?>
</p>
      
<p><?php echo form_submit('submit', 'Submit');?></p>
      
<?php echo form_close();?>