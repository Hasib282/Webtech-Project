<?php 
	session_start();
	
	if(isset($_SESSION['email'])){
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Donor Profile</title>
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
				$pass = trim($user[1]);
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
	
	
	
	
	
	
	<form action="donor_profile_edit.php" method="post">
		<table align="center">
			<tr>
				<th><h3>Profile Details</h3></td>
			</tr>
			<tr>
				<td>
					<b>Email</b><br />
					<input type="email" name="email" value="<?php echo $email ?>" Placeholder="Email" readonly>
				</td>
			</tr>
			<tr>
				<td>
					<b>Password</b><br />
					<input type="text" name="pass" value="<?php echo $pass ?>" placeholder="Password" readonly>
					
					<a href="change_pass.php"><input type="button" name="password" value="Change Password"></a>
				</td>
			</tr>
			<tr>
				<td>
					<b>Name</b><br />
					<input type="text" name="name" value="<?php echo $name ?>" placeholder="First Name">
				</td>
			</tr>
			<tr>
				<td>
					<b>Phone</b><br />
					<input type="number" name="phone" value="<?php echo $phone ?>" Placeholder="Phone">
				</td>
			</tr>
			<tr>
				<td>
					<b>NID</b><br />
					<input type="number" name="nid" value="<?php echo $nid ?>" Placeholder="NID NUMBER">
				</td>
			</tr>
			<tr>
				<td>
					<b>Date of Birth</b><br />
					<input type="date" name="dob" value="<?php echo $dob ?>" >
				</td>
			</tr>
			<tr>
				<td>
					<b>Gender</b><br />
					<input type="text" name="gender" value="<?php echo $gender ?>" placeholder="Gender">
				</td>
			</tr>
			<tr>
				<td>
					<b>Present Address</b><br />
					<input type="text" name="preaddress" Value="<?php echo $preaddress ?>" placeholder="Present Address">
				</td>
			</tr>
			<tr>
				<td>
					<b>Permanent Address</b><br />
					<input type="text" name="peraddress" Value="<?php echo $peraddress ?>" placeholder="Permanent Address">
				</td>
			</tr>
			<tr>
				<td>
					<b>Photo</b><br />
					<img src="Photo/<?php echo $photo ?>" alt="" name="photo" />
				</td>
			</tr>
			<tr>
				<td>
					<a href=""><input type="file" name="photo" value="" accept="image/*"></a>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="Save changes">
				</td>
			</tr>
			<tr>
				<td>
					<a href="delete_account.php"><input type="button" name="delete" value="Delete Profile"></a>
				</td>
			</tr>
		</table>
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