<?php
$db=mysqli_connect("localhost:3307","root","","phpcrud_db");
if(!$db){
	die('error in db'.mysqli_error($db));
}
else
{
	$id = $_GET['id'];
	$qry="SELECT * FROM user where user_id = $id";
			$query_run=mysqli_query($db,$qry);
			if($query_run->num_rows > 0)
			{
				while($row = $query_run -> fetch_assoc())
				{
                $userfirstName = $row['user_firstName'];
                $userlastName = $row['user_lastName'];
                $userD_O_B = $row['user_D_O_B'];
                $usergender = $row['user_gender'];
                $useremail = $row['user_email'];
                $userpassword = $row['user_password'];
                $usernumber = $row['user_number'];
}
}
}
?>
<html>
	<head>
		<title>Edit User</title>
	</head>
	<body>
		<form method="post">
			<label for="firstName">FirstName</label>
			<input type="text" name="firstName"value="<?php echo $userfirstName;?>"><br>
			<label for="lastName">LastName</label>
			<input type="text" name="lastName"value="<?php echo $userlastName;?>"><br>
			<label for="d_o_b">D_O_B</label>
			<input type="date" name="d_o_b"value="<?php echo $userDOB;?>"><br>
			<label>Gender</label>
			<input type="radio" name="gender"value="Male">Male
			<input type="radio" name="gender"value="Female">Female
			<input type="radio" name="gender"value="Others">Others<br>
			<label for="email">Email Id</label>
			<input type="email" name="email"value="<?php echo $useremail;?>"><br>
			<label for="password">Password</label>
			<input type="password" name="password"value="<?php echo $userpassword;?>"><br>
			<label for="mobile">PhoneNumber</label>
			<input type="number" name="mobile"value="<?php echo $usernumber;?>"><br>
			<input type="submit" name="update"value="update">
		</form>
	</body>
</html>
<?php
if(isset($_POST['update']))
{
	$name1=$_POST['firstName'];
	$name2=$_POST['lastName'];
	$D_O_B=$_POST['d_o_b'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$number=$_POST['mobile'];

	$qry = "update user set user_firstName='$name1',user_lastName='$name2',user_D_O_B='$D_O_B',user_gender='$gender',user_email='$email',user_password='$password',user_number='$number'where user_id = $id";
	if(mysqli_query($db, $qry))
	{
		header('location: user.php');
	}
	else
	{
		echo mysqli_error($db);
	}
}
?>