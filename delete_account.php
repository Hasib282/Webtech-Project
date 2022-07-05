<?php
	session_start();

	if(isset($_SESSION['email'])){
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Delete Account</title>
</head>
<body>
	<?php
		require('donor_header.html');
	?>
	
	<form action="confirm.php" method="post">
			<h1 align="center">Are you sure?</h1>
			<table align="center">
				<tr align="center">
					<input type="hidden" name="fname" value="delete"/> <br>
					<td><input type="submit" name="yes" value="Yes"/></td>
					<td><input type="submit" name="no" value="No"/></td>
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