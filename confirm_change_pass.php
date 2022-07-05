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
	<?php 
		$email_store = $_SESSION['email']; 
		$file = fopen('user.txt', 'r');
				
		while (!feof($file)) {
			$data = fgets($file);
			$user = explode("|", $data); 
			if($email_store == trim($user[0])) { //match email
				$email = trim($user[0]);
				$password = trim($user[1]);
				$name = trim($user[2]);
				$phone = trim($user[3]);
				$nid = trim($user[4]);
				$dob = trim($user[5]);
				$gender = trim($user[6]);
				$preaddress = trim($user[7]);
				$peraddress = trim($user[8]);
				$photo = trim($user[9]);
			}
		}	
	?>




<?php
	
	$oldpass = $_REQUEST['oldpass'];
	$pass = $_REQUEST['pass'];
	$cpass = $_REQUEST['cpass'];
	
	
	//If any field is empty
	if($oldpass == null || $pass == null || $cpass == null){
		$error_pass = "*You need to fill all the fields<br>";
?>
	<form action="confirm_change_pass.php" method="post" enctype="">
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
					<?php echo $error_pass; ?>
					<td><input type="submit" name="submit" value="Submit"/></td>
				</tr>
			</table>
		</fieldset>
	</form>
	
<?php
	}
	
	
	//if current password is wrong
	else if($oldpass != $password){
		$error_pass = "You current password is wrong";
?>
	<form action="confirm_change_pass.php" method="post" enctype="">
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
					<?php echo $error_pass; ?>
					<td><input type="submit" name="submit" value="Submit"/></td>
				</tr>
			</table>
		</fieldset>
	</form>



<?php
	}
	
	//if condition doesn't match
	else if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/",$pass)){
		$error_pass = "*Must contain one upper letter,lower letter and digit<br>";
?>
	<form action="confirm_change_pass.php" method="post" enctype="">
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
					<?php echo $error_pass; ?>
					<td><input type="submit" name="submit" value="Submit"/></td>
				</tr>
			</table>
		</fieldset>
	</form>
<?php
	}
	
	//If password length is not 8
	else if(strlen($pass)!= 8){
		$error_pass = "*8 digit only <br>";
?>
	<form action="confirm_change_pass.php" method="post" enctype="">
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
					<?php echo $error_pass; ?>
					<td><input type="submit" name="submit" value="Submit"/></td>
				</tr>
			</table>
		</fieldset>
	</form>

<?php
	}
	
	//if pass and confirm pass doesn't match
	else if($pass != $cpass){
		$error_pass = "*Password not matched<br>";
?>
	<form action="confirm_change_pass.php" method="post" enctype="">
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
					<?php echo $error_pass; ?>
					<td><input type="submit" name="submit" value="Submit"/></td>
				</tr>
			</table>
		</fieldset>
	</form>


<?php
	}
	else{
		$_SESSION['pass'] = $pass;
?>
		
		<form action="confirm.php" method="post">
				<h1 align="center">Are you sure?</h1>
				<table align="center">
					<tr align="center">
						<input type="hidden" name="fname" value="pass"/> <br>
						<td><input type="submit" name="yes" value="Yes"/></td>
						<td><input type="submit" name="no" value="No"/></td>
					</tr>
				</table>
			</fieldset>
		</form>
		
	
	<?php
	}
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