<html>
<body>
	<br /><br /><br /><br /><br /><br /><br /><br /><br />
	<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
	<?php
	if(isset($msg) && $msg!="")
	{	
		echo "<center style='color:red'>".$msg."</center><br />";
		$msg = "";
	}
	?>
	<form name="form1" method="post" action="<?php echo base_url().'/index.php/admin/login'?>">
	<td>
	<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
	<tr>
	<td colspan="3"><strong>Skill Home Admin Login </strong></td>
	</tr>
	<tr>
	<td width="78">Username</td>
	<td width="6">:</td>
	<td width="294"><input name="myusername" type="text" id="myusername"></td>
	</tr>
	<tr>
	<td>Password</td>
	<td>:</td>
	<td><input name="mypassword" type="password" id="mypassword"></td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td><input type="submit" name="Submit" value="Login"></td>
	</tr>
	</table>
	</td>
	</form>
	</tr>
	</table>
</body>
</html>
