<html>
<head>
<title>Extract Info</title>
<style>
	body {
		background-color: lightblue;
		color: white;
	}
	input.txt {
		width: 200px;
		height: 40px;
		border: 2px solid cyan;
		border-radius: 3px;
		margin: 20px;
		padding: 5px;
	}
	input.but {
		width: 150px;
		height: 40px;
		border: 2px solid cyan;
		border-radius: 3px;
		margin: 20px;
		padding: 5px;
		text-align: center;
		font-weight: bold;
		background-color: white;
	}
	input.but:hover {
		border: 2px solid yellow;
		background-color: black;
		color: yellow;
	}
	select {
		width: 200px;
		height: 40px;
		border: 2px solid cyan;
		border-radius: 3px;
		margin: 20px;
		padding: 5px;
	}
	table {
		width: 80%;
		font-family: arial;
		margin: 80px;
	}
	tr {
		height: 40px;
		background-color: white;
		color: black;
	}
	tr:nth-child(even)
	{
		background-color: grey;
	}
	th {
		background-color: lightgrey;
		color: white;
	}
</style>
</head>
<body>
<center>
<br><br><br>
	<form action="retrieval.php" method="post">
		<input class="txt" type="text" name="firstname" placeholder="Search by first name" pattern="[a-zA-Z\s]+$"/>
		</br><select name="gender">
			<option value="">Search by gender</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</select></br>
		<input class="but" type="submit" value="Search Criteria" name="criteria">
		<input class="but" type="submit" value="Show All" name="all">
	</form>
	<?php
		if(isset($_POST['criteria']))
		{
			criteria();
		}
		if(isset($_POST['all']))
		{
			all();
		}

		function criteria()
		{
			if(empty($_POST['firstname']))
			{
				$firstname="";
			}
			else
			{
				$firstname=$_POST['firstname'];
			}
			if(empty($_POST['gender']))
			{
				$gender="";
			}
			else
			{
				$gender=$_POST['gender'];
			}
			$link=mysqli_connect("localhost","organdonation","donate@123","donation");
			$res=$link->query("SELECT * FROM `donor` WHERE name='$firstname' OR gender='$gender'");
			if($res->num_rows>0)
			{
				echo "<table><tr><th>Name</th><th>Gender</th><th>Mobile No.</th><th>Email</th></tr>";
				for($i=1;$i<=($res->num_rows);$i++)
				{
					$data=$res->fetch_assoc();
					$name=$data['name'];
					$lname=$data['lname'];
					$gender=$data['gender'];
					$mob=$data['contact'];
					$email=$data['email'];

					echo "<tr align=\"center\"><td>".$name." ".$lname."</td><td>".$gender."</td><td>".$mob."</td><td>".$email."</td></tr>";
				}
				echo "</table>";
			}
			else
			{
				echo "<br><br><br><h3>No Data Found</h3>";
			}
		}

		function all()
		{
			$link=mysqli_connect("localhost","organdonation","donate@123","donation");
			$res=$link->query("SELECT * FROM `donor`");
			if($res->num_rows>0)
			{
				echo "<table><tr><th>Name</th><th>Gender</th><th>Mobile No.</th><th>Email</th></tr>";
				for($i=1;$i<=($res->num_rows);$i++)
				{
					$data=$res->fetch_assoc();
					$fname=$data['name'];
					$lname=$data['lname'];
					$gender=$data['gender'];
					$mob=$data['contact'];
					$email=$data['email'];

					echo "<tr align=\"center\"><td>".$fname." ".$lname."</td><td>".$gender."</td><td>".$mob."</td><td>".$email."</td></tr>";
				}
				echo "</table>";
			}
			else
			{
				echo "<br><br><br><h3>No Data Found</h3>";
			}
		}		
	?>
</center>
</body>
</html>