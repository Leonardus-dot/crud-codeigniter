<html>
    <head>
        <title>Leonardus - 2016</title>
    </head>
    <body>
    <h2>Tambah data user</h2>
    <form role="form" action="<?= $this->config->base_url(); ?>user/prosesadd" method="post" enctype="multipart/form-data">      
        <div>
        <table>
        <tr>
            <td><label>Nama</label></td>
            <td> :</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td><label>Password</label></td> 
            <td>:</td>
            <td><input type="password" name="password" ></td>
        </tr>
        <tr>
            <td><label>Level</label> </td>
            <td>:</td>
            <td>
			<select name="level">
			<option value="0"> - </option>
			 <? foreach ($d as $data) {?>
		 	 <option value="<? print $data->levelid; ?>"> <? print $data->desc; ?> </option>
    		 <? }?>
			</select>
            </td>
        </tr>
        </div>
        <tr>
        <td><input type ="submit" name="submit"></td>
        </tr>
    </form>
    </body>
</html>
