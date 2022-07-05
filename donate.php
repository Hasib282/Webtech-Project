<?php 
	session_start();

	if(isset($_SESSION['email'])){
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Donate</title>
</head>
<body>
	<?php
		require('donor_header.html');
		$email = $_SESSION['email'];
	?>
	<form action="">
		<table align="center" >
		<tr>
			<td>
				Email: <br />
				<input type="email" name="email" value="<?php echo $email; ?>" readonly /><br /><br />
			</td>
		</tr>
		<tr>
			<td>
				Donation Amount: <br />
				<input type="number" name="amount" placeholder="Enter amount you want to donate." /><br /><br />
			</td>
		</tr>
		<tr>
			<td>
				Phone: <br />
				<input type="number" name="phone" placeholder="Enter your phone"/><br /><br />
			</td>
		</tr>
		<tr>
			<td>
				Comment <br />
				<textarea name="comment" cols="25" rows="3"></textarea><br /><br />
			</td>
		</tr>
		<tr>
			<td>
				Payment Option: <br />
				<input type="radio" name="gender" value="Bank" checked> Bank
				<input type="radio" name="gender" value="Mobile Banking" > Mobile Banking
				<input type="radio" name="gender" value="Other" > Other<br /><br />
			</td>
		</tr>
		<tr>
			<td><input type="submit" name="donate" value="Donate" /></td>
		</tr>
		
		</table>
	</form>
	
	
	
</body>
</html>
<?php
	}
	else{
		echo "Invalid request";
	}
?>