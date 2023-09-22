<?php $db=mysqli_connect("localhost:3307","root","","phpcrud_db");?>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<title>PHP CRUD</title>
		<style>
			h1
			{
				background-color:black;
				color:white;
			}
			h3
			{
			    background-color:green;
				color:white;
				text-align:center;	
			}
			table th
			{
				background-color:yellow;
			}
			form
			{
				background-image:url("https://img.freepik.com/free-photo/blue-wall-background_53876-88663.jpg?w=360&t=st=1695384517~exp=1695385117~hmac=33d40596332524ca8ed99f8e501b2dbe56db3aaa2429785c33d1d77e456f44cd");
				background-repeat:no-repeat;
				background-size:cover;
			}
			label
			{
				font-weight:700;
			}
		</style>
	</head>
	<body>
		<center>
		<h1>Employee Register</h1>
		<form method="post">
			<i class="fa fa-user" aria-hidden="true"></i>&nbsp;<label for="firstName">FirstName</label>
			<input type="text" name="firstName"placeholder="Enter First Name"required><br>
			<i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;<label for="lastName">LastName</label>
			<input type="text" name="lastName"placeholder="Enter Last Name"required><br>
			&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;<label for="d_o_b" style="padding-right:-4%;">D_O_B</label>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="date" name="d_o_b"required style="margin-right:6%;"><br>
			<i class="fa fa-venus-mars" aria-hidden="true"></i>&nbsp;<label>Gender</label>
			<input type="radio" name="gender"value="Male">Male
			<input type="radio" name="gender"value="Female">Female
			<input type="radio" name="gender"value="Others">Others<br>
			<i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;<label for="email">Email Id</label>
			<input type="email" name="email"placeholder="Email_Id"required><br>
			<i class="fa fa-key" aria-hidden="true"></i>&nbsp;<label for="password">Password</label>
			<input type="password" name="password"placeholder="Fill_Password"required><br>
			<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;<label for="mobile">Mobile</label>
			<input type="number" name="mobile"placeholder="Contact_Number"required><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit"value="submit">
		</form>
             </center>
		<hr>

		<h3>Employee List</h3>
		<table style="width:100%"border="1">
			<tr>
				<th>S#</th>
				<th>FirstName</th>
				<th>LastName</th>
				<th>D_O_B</th>
				<th>Gender</th>
				<th>Email</th>
				<th>Password</th>
				<th>Number</th>
				<th>Operation</th>
			</tr>
			<?php
			$i = 1;
			$qry="SELECT * FROM user";
			$query_run=mysqli_query($db,$qry);
			if($query_run->num_rows > 0)
			{
				while($row = $query_run -> fetch_assoc())
				{
                 $id = $row['user_id'];
		?>
		<tr>
			<th style="background-color:black;color:white;"><?php echo $i++;?></th>
			<td><?php echo $row['user_firstName']?></td>
			<td><?php echo $row['user_lastName']?></td>
			<td><?php echo $row['user_D_O_B']?></td>
			<td><?php echo $row['user_gender']?></td>
			<td><?php echo $row['user_email']?></td>
			<td><?php echo $row['user_password']?></td>
			<td><?php echo $row['user_number']?></td>
			<td>
				<a href="edit.php?id=<?php echo $id; ?>">Edit</a> |
				<a href="delete.php?id=<?php echo $id; ?>"onclick="return confirm('Are you sure?')">Delete</a>
			</td>
		</tr>
		<?php
         }
			}
		?>
		</table>
	</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$name1=$_POST['firstName'];
	$name2=$_POST['lastName'];
	$d_o_b=$_POST['d_o_b'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$number=$_POST['mobile'];
	$qry="INSERT INTO user VALUES(null,'$name1','$name2','$d_o_b','$gender','$email','$password','$number')";
	if(mysqli_query($db,$qry))
	{
		echo '<script>alert("User Registerd Successfully!");</script>';
		header('location:user.php');
	}
	else
	{
		echo mysqli_error($db);
	}
}
?>
