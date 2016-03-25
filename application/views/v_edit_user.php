<html>
<head> <title>Leonardus - 2016</title> </head>
<body>
<h2>Form Edit Data</h2>
<form role="form" action="<?= $this->config->base_url(); ?>user/prosesedit" method="post" enctype="multipart/form-data">     
<? foreach ($e as $data) ?> 
<table>
<tr>
	<td>Username</td>
	<td> : </td> 
	<td><input type="text" name="username" value="<? print $data->username ?>" ></td>
</tr>
<tr>
	<td>Password</td> 
	<td>:</td>
	<td><input type="password" name="password" value="<? print $data->password ?>"></td>
</tr>
<tr>
	<td>Level </td>
	<td> : </td>
	<td><select name="level">
		<option name="level" value="<? print $data->level ?>"> <? print $data->desc ?> </option>
		<? foreach ($d as $data2){ ?>
		<option name="level" value="<? print $data2->levelid; ?>" > <? print $data2->desc; ?> </option>
		<? } ?>
		</select>
	</td>
</tr>
<tr>
	<td>Status </td>
	<td> : </td>
	<td><select name="status">
		<option value="<? print $data->status ?>" name="status"> 
					   <? if ($data->status=='A') { print "AKTIF"; } else print "TIDAK AKTIF"; ?></option>
		<option value="A" name="status"> AKTIF </option>
		<option value="N" name="status"> TIDAK AKTIF</option>
		</select>
	</td>
</tr>
<tr>
	<td>
	<input type="submit" name="submit">
	</td>
</tr>
</table>
</form>
</body>
</html>
