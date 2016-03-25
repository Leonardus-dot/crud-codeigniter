<html>
    <head>
        <title> Leonardus - 2016 </title>
    </head>
    <body>
        <h1>Tabel user</h1>
		welcome <?php echo $this->session->userdata('username'); ?> , <?php  print " <a href=" . $this->config->base_url() . "login/logout> Logout"; ?><br>
        <?php
        print "<a href=" . $this->config->base_url() . "user/add/>+ add</a>";
		
        ?>
		<?php echo $message; ?>
		
		<table border="1">
		<thead>
		<tr>
			<th>Nama</th>
			<th>Level</th>
			<th>status</th>
			<th>Tools</th>
		</tr>
		<?php
	
		foreach ($u as $data) {
		
			print "<tr>";
			print "<td> $data->username </td>";
			print "<td> $data->desc </td>";
			print "<td>";if ($data->status=='A') { print "AKTIF"; }
						 else print "TIDAK AKTIF";
			print "</td>";
			print "<td>";
			print  "<a href=" . $this->config->base_url() . 'user/edit/' . $data->username . ">Edit</a> ||"; 
			print  "<a href=" . $this->config->base_url() . 'user/delete/' . $data->username . ">Delete</a>";
			print "</td>";
			print "</tr>";
		   
		}
		?>
	</table>
</body>
</html>
