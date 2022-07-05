<?php 
	session_start();

	if(isset($_SESSION['email'])){
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Donor Edit Profile</title>
</head>
<body>
	<?php
		require('donor_header.html');
	?>
<?php
		$name = $_REQUEST["name"];
		$email = $_REQUEST["email"];
		$phone = $_REQUEST["phone"];
		$nid = $_REQUEST["nid"];
		$dob = $_REQUEST["dob"];
		$gender = $_REQUEST["gender"];
		$preaddress = $_REQUEST["preaddress"];
		$peraddress = $_REQUEST["peraddress"];
		$photo = $_REQUEST["photo"];
		$pass = $_REQUEST["pass"];
		
		
		$error_name=$error_phone=$error_nid=$error_dob=$error_gender=$error_preaddress=$error_peraddress=$error_photo="";
		
		
		//Name validation
		if($name == null){ //null check
			$error_name = "*Name is required<br>";
		}
		else if(strlen($name)<2){ //if less than two charecter
			$error_name = "*Name must contain two words<br>";
		}
		else if(!preg_match("/^[a-zA-Z][a-zA-Z_\.\s]*$/",$name)){
			$error_name = "*Only contain letter '_' and '.' also need to be start with a letter<br>";
		}
			
		//phone validation
		if($phone == null){
			$error_phone = "*Phone is required<br>";
		}
		else if(!preg_match("/^[0][1][3-9][0-9]{8}$/",$phone)){
			$error_phone = "*Invalid Phone Number<br>";
		}
		
			
			
		//nid validation
		if($nid == null){
			$error_nid = "*NID is required<br>";
		}
			
			
		
		//dob validation
		if($dob == null){
			$error_dob = "*Date of Birth is required<br>";
		}
			
			
		//gender validation
		if($gender == null){
			$error_gender = "*Gender is required<br>";
		}
		else if($gender != 'Male' && $gender != 'Female' && $gender != 'Other'){
			$error_gender = "*Gender must be Male/Female/Other<br>";
		}
			
			
			
		//present address
		if($preaddress == null){
			$error_preaddress = "*Present Address is required<br>";
		}
			
			
		//permanent address
		if($peraddress == null){
			$error_peraddress = "*Permanent address is required<br>";
		}
			
			
		//photo
		if($photo == null){
			$error_photo = "*Photo is required<br>";
		}
		
		if($error_name=="" && $error_phone=="" && $error_nid=="" && $error_dob=="" && $error_gender=="" && $error_preaddress=="" && $error_peraddress=="" && $error_photo==""){
			//count line number
			$file = fopen('user.txt', 'r');
			$line = -1;
			while (!feof($file)) {
				$data = fgets($file);
				$user = explode("|", $data); 
				$line++;
				if($email == trim($user[0])) { //match email
					break;
				}
			}
			//Replace updated informations
			$filearr = file('user.txt');
			$filearr[$line] = $email."|".$pass."|".$name."|".$phone."|".$nid."|".$dob."|".$gender."|".$preaddress."|".$peraddress."|".$photo."\r\n";
			$filearr = implode($filearr);
			file_put_contents('user.txt',$filearr);
			fclose($file);
			header("location: donor_profile.php ");
		}
		else{
			
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
						<td><?php echo $error_email;?></td>
					</tr>
					<tr>
						<td>
							<b>Password</b><br />
							<input type="text" name="pass" value="<?php echo $pass ?>" placeholder="Password" readonly>
							<a href="change_pass.php"><input type="button" name="password" value="Change Password"></a>
						</td>
						<td><?php echo $error_pass;?></td>
					</tr>
					<tr>
						<td>
							<b>Name</b><br />
							<input type="text" name="name" value="<?php echo $name ?>" placeholder="First Name">
						</td>
						<td><?php echo $error_name;?></td>
					</tr>
					<tr>
						<td>
							<b>Phone</b><br />
							<input type="number" name="phone" value="<?php echo $phone ?>" Placeholder="Phone">
						</td>
						<td><?php echo $error_phone;?></td>
					</tr>
					<tr>
						<td>
							<b>NID</b><br />
							<input type="number" name="nid" value="<?php echo $nid ?>" Placeholder="NID NUMBER">
						</td>
						<td><?php echo $error_nid;?></td>
					</tr>
					<tr>
						<td>
							<b>Date of Birth</b><br />
							<input type="date" name="dob" value="<?php echo $dob ?>" >
						</td>
						<td><?php echo $error_dob;?></td>
					</tr>
					<tr>
						<td>
							<b>Gender</b><br />
							<input type="text" name="gender" value="<?php echo $gender ?>" placeholder="Gender">
						</td>
						<td><?php echo $error_gender;?></td>
					</tr>
					<tr>
						<td>
							<b>Present Address</b><br />
							<input type="text" name="preaddress" Value="<?php echo $preaddress ?>" placeholder="Present Address">
						</td>
						<td><?php echo $error_preaddress;?></td>
					</tr>
					<tr>
						<td>
							<b>Permanent Address</b><br />
							<input type="text" name="peraddress" Value="<?php echo $peraddress ?>" placeholder="Permanent Address">
						</td>
						<td><?php echo $error_peraddress;?></td>
					</tr>
					<tr>
						<td>
							<b>Photo</b><br />
							<img src="Photo\<?php echo $photo ?>" alt=""/>
						</td>
					</tr>
					<tr>
						<td>
							<a href=""><input type="file" name="photo" value="" accept="image/*"></a>
						</td>
						<td><?php echo $error_photo;?></td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="submit" value="Save changes">
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
	}
	else{
		echo "Invalid request";
	}
?>