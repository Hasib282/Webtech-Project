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
				<a href="donor_log.php">Log In</a>&nbsp;/
				<a href="donor_reg.php">Registration</a>
			</td>
		</tr>
		</table>
		<br />
		<br />
	</header>
	<!-- Header design end -->






	<form action="donor_reg_check.php" method="post" >
		<fieldset style="border:none;">
			<legend align="center"><h1>Registration</h1></legend>
			<table align="center">
				<tr>
					<td>
						<b>Name</b> <br />
						<input type="text" name="name" value="" placeholder="Name">	<br /><br />
					</td>
				</tr>
				<tr>
					<td>
						<b>Email</b><br />
						<input type="text" name="email" value="" Placeholder="Email"><br /><br />
					</td>
				</tr>
				<tr>
					<td>
						<b>Phone</b><br />
						<input type="number" name="phone" value="" Placeholder="Phone"><br /><br />
					</td>
				</tr>
				<tr>
					<td>
						<b>NID</b><br />
						<input type="number" name="nid" value="" Placeholder="NID NUMBER"><br /><br />
					</td>
				</tr>
				<tr>
					<td>
						<b>DOB</b><br />
						<input type="date" name="dob" value="" ><br /><br />
					</td>
				</tr>
				<tr>
					<td>
						<b>Gender</b><br />
						<input type="radio" name="gender" value="Male" checked> Male
						<input type="radio" name="gender" value="Female" > Female
						<input type="radio" name="gender" value="Other" > Other<br /><br />
					</td>
				</tr>
				<tr>
					<td>
						<b>Present Address</b><br />
						<input type="text" name="preaddress" Value="" placeholder="Present Address"><br /><br />
					</td>
				</tr>
				<tr>
					<td>
						<b>Permanent Address</b><br />
						<input type="text" name="peraddress" Value="" placeholder="Permanent Address"><br /><br />
					</td>
				</tr>
				<tr>
					<td>
						<b>Attach your Photo</b><br />
						<input type="file" name="photo" value="" accept="image/*"><br /><br />
					</td>
				</tr>
				<tr>
					<td>
						<b>Password</b><br />
						<input type="password" name="pass" value="" placeholder="Password"><br /><br />
					</td>
				</tr>
				<tr>
					<td>
						<b>Confirm Password</b><br />
						<input type="password" name="cpass" value="" placeholder="Confirm Password"><br /><br />
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="submit" value="Submit">
						<input type="reset" name="reset" value="Reset">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><h3>Already have an account? <br /><a href="donor_log.php">Log in</a></h3></td>
				</tr>
			</table>
		</fieldset>
	</form>
	
	
	<?php
		require('footer.html');
	?>
</body>
</html>