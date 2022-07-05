<?php
	session_start();

	if(isset($_SESSION['email'])){
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Change Password</title>
</head>
<body>
	<?php
		require('donor_header.html');
	?>
	
	<form action="confirm_change_pass.php" method="post">
		<fieldset style="width:0px; margin:0px auto;">
			<legend align="center"><h3>Change Password</h3></legend>
			<table align="center">
				<tr>
					<td><br /><input type="text" name="oldpass" value="" placeholder="Current Password"/><br /><br /></td>
				</tr>
				<tr>
					<td><input type="password" name="pass" value="" placeholder="New Password"/><br /><br /></td>
				</tr>
				<tr>
					<td><input type="password" name="cpass" value="" placeholder="Confirm New Password"/><br /><br /></td>
				</tr>
				<tr align="center">
					<td><input type="submit" name="submit" value="Submit"/></td>
				</tr>
			</table>
		</fieldset>
	</form>
	
	
	<?php
		require('footer.html');
	?>
</body>
</html>

<?php
	}
	else{
		echo "Invalid request";
	}
?>