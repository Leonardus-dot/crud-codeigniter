WELCOME, Halaman login Sistem.
<br />
<br />
<?php echo "$notif"; ?>
<form method="post" action="<?php echo base_url(); ?>login/verifikasi">
<div class="input-group">
	<span class="input-group-addon">
		<span class="glyphicon glyphicon-user"></span>
	</span>
	Username : <br />
	<input type="text" class="form-control" placeholder="Username" name="username" required>
</div>
<br>
<div class="input-group">
	<span class="input-group-addon">
		<span class="glyphicon glyphicon-eye-close"></span>
	</span>
	Password : <br />
	<input type="password" class="form-control" placeholder="Password" name="password" required>
</div>
<br>
<input type="submit" class="btn btn-block btn-primary" value="Login">

</form>