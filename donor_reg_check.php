<!DOCTYPE HTML>
<html>
<head>
	<title>Donor Registration</title>
</head>
<body>
	<!-- Header design start -->
	<header>
		<br />
		<table width="90%" align="center">
		<tr>
			<td align ="center" width="8%">
				<img src="Photo/ABC.png" alt="" height="100%" width="100%" />
			</td>
			<td align ="center" width="70%">
				<a href="home.php">Home</a>&nbsp;| &nbsp;
				<a href="#">Events</a>&nbsp;|&nbsp;
				<a href="#">Fundraise for</a>&nbsp;|&nbsp;
				<a href="#">How It Works</a>&nbsp;|&nbsp;
				<a href="#">Contact</a>
			</td>
			<td align="right" width="18%">
				<a href="donor_log.html">Log In</a>&nbsp;/
				<a href="donor_reg.html">Registration</a>
			</td>
		</tr>
		</table>
		<br />
		<br />
	</header>
	<!-- Header design end -->







<?php
	//variable defines
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
	$cpass = $_REQUEST["cpass"];
	
	$error_name=$error_email=$error_phone=$error_nid=$error_dob=$error_gender=$error_preaddress=$error_peraddress=$error_photo=$error_pass="";
	
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
		
		
		
		
	//email validation
	if($email == null){
		$error_email = "*Email is required<br>";
	}
	else if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,3}$/",$email)){
		$error_email = "*Invalid Email Address<br>";
	}
	else{
		//Chech if email is already exist or not
		$file = fopen('user.txt', 'r');
		while (!feof($file)) {
			$data = fgets($file);
			$user = explode("|", $data); 
			if(trim($user[0]) == $email){
				$error_email = "*Email name already taken.";
				break;
			}
		}
		fclose($file);
	}
	
	//phone validation
	if($phone == null){
		$error_phone = "*Phone is required<br>";
	}
	else if(!preg_match("/^[0][1][3-9][0-9]{8}$/",$phone)){
		$error_phone = "*invalid phone<br>";
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
		
		
		
	//present address
	if($preaddress == null){
		$error_preaddress = "*Present Address is required<br>";
	}
	else if(!preg_match("/^[\s\w\-\#\,\/\\\]*$/",$preaddress)){
		$error_preaddress = "*Use alphabets, numbers, whitspace, _, -, #, /, \ and coma',' only<br>";
	}
		
		
	//permanent address
	if($peraddress == null){
		$error_peraddress = "*Permanent address is required<br>";
	}
	else if(!preg_match("/^[\s\w\-\#\,\/\\\]*$/",$peraddress)){
		$error_peraddress = "*Use alphabets, numbers, whitspace, _, -, #, /, \ and coma',' only<br>";
	}
		
		
	//photo
	if($photo == null){
		$error_photo = "*Photo is required<br>";
	}
		
	//password
	if($pass == null || $cpass == null){
		$error_pass = "*Password is required<br>";
	}
	else if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/",$pass)){
		$error_pass = "*Must contain one upper letter,lower letter and digit. Not more than 6 digit <br>";
	}
	else if(strlen($pass)!= 8){
		$error_pass = "*8 digit only <br>";
	}
	else if($pass != $cpass){
		$error_pass = "*Password not matched<br>";
	}
	

		
	//if no error than go to login page
	if ($error_name=="" && $error_email=="" && $error_phone=="" && $error_nid=="" && $error_dob=="" && $error_gender=="" && $error_preaddress=="" && $error_peraddress=="" && $error_photo=="" && $error_pass==""){
		//print formate	
		$user = $email."|".$pass."|".$name."|".$phone."|".$nid."|".$dob."|".$gender."|".$preaddress."|".$peraddress."|".$photo."\r\n";
		//write data in a file
		$file = fopen('user.txt', 'a');
		fwrite($file, $user);
		fclose($file);
		header('location: donor_log.html');
	}
	else{
?>


	<!-- form error show -->
	<form action="donor_reg_check.php" method="post" >
		<fieldset style="border:none">
			<legend align="center"><h1>Registration</h1></legend>
			<table align="center">
				<tr>
					<td>
						<b>Name</b> <br />
						<input type="text" name="name" value="<?php echo $name; ?>" placeholder="Name"><br /><br />
					</td>
					<td><?php echo $error_name;?></td>
				</tr>
				<tr>
					<td>
						<b>Email</b><br />
						<input type="text" name="email" value="<?php echo $email; ?>" Placeholder="Email"><br /><br />
					</td>
					<td><?php echo $error_email;?></td>
				</tr>
				<tr>
					<td>
						<b>Phone</b><br />
						<input type="number" name="phone" value="<?php echo $phone; ?>" Placeholder="Phone"><br /><br />
					</td>
					<td><?php echo $error_phone;?></td>
				</tr>
				<tr>
					<td>
						<b>NID</b><br />
						<input type="number" name="nid" value="<?php echo $nid; ?>" Placeholder="NID NUMBER"><br /><br />
					</td>
					<td><?php echo $error_nid;?></td>
				</tr>
				<tr>
					<td>
						<b>DOB</b><br />
						<input type="date" name="dob" value="<?php echo $dob; ?>" ><br /><br />
					</td>
					<td><?php echo $error_dob;?></td>
				</tr>
				<tr>
					<td>
						<b>Gender</b><br />
						<input type="radio" name="gender" value="Male" checked> Male
						<input type="radio" name="gender" value="Female" > Female
						<input type="radio" name="gender" value="Other" > Other<br /><br />
					</td>
					<td><?php echo $error_gender;?></td>
				</tr>
				<tr>
					<td>
						<b>Present Address</b><br />
						<input type="text" name="preaddress" Value="<?php echo $preaddress; ?>" placeholder="Present Address"><br /><br />
					</td>
					<td><?php echo $error_preaddress;?></td>
				</tr>
				<tr>
					<td>
						<b>Permanent Address</b><br />
						<input type="text" name="peraddress" Value="<?php echo $peraddress; ?>" placeholder="Permanent Address"><br /><br />
					</td>
					<td><?php echo $error_peraddress;?></td>
				</tr>
				<tr>
					<td>
						<b>Attach your Photo</b><br />
						<input type="file" name="photo" value="<?php echo $photo; ?>" accept="image/*"><br /><br />
					</td>
					<td><?php echo $error_photo;?></td>
				</tr>
				<tr>
					<td>
						<b>Password</b><br />
						<input type="password" name="pass" value="<?php echo $pass; ?>" placeholder="Password"><br /><br />
					</td>
					<td><?php echo $error_pass;?></td>
				</tr>
				<tr>
					<td>
						<b>Confirm Password</b><br />
						<input type="password" name="cpass" value="<?php echo $cpass; ?>" placeholder="Confirm Password"><br /><br />
					</td>
					<td><?php echo $error_pass;?></td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="submit" value="Submit">
						<input type="reset" name="reset" value="Reset">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><h3>Already have an account?<br /><a href="donor_log.php">Log in</a></h3> </td>
				</tr>
			</table>
		</fieldset>
	</form>
<?php
	}
?>


	<?php
		require('footer.html');
	?>
</body>
</html>