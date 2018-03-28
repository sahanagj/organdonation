<?php
session_start();
$servername = "localhost";
$username = "organdonation";
$password = "donate@123";
$dbname = "donation";
   $conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
	die("connection failed :" .$conn->connect_error);
}
//echo "connected succesfully.";
    $email=$_POST['email']; 
    $password=$_POST['password']; 
    $sql = "SELECT * FROM donor WHERE email='$email'and password='$password'";
$result = $conn->query($sql);
    if ($result->num_rows==1) 
    {
		$_SESSION['email'] = $_POST['email'];
		while($row = $result->fetch_assoc()){
       // echo "donor_id ".$row["donor_id"]."<br>name ".$row["name"]." <br>dob: " . $row["dob"]. "<br>email " . $row["email"]."<br>gender ".$row["gender"];
		//echo $id;
		
		$_SESSION['id']=$row["donor_id"];
		$_SESSION['donor_id']=$row["donor_id"];
		$_SESSION['name']=$row["name"];
		$_SESSION['dob']=$row["dob"];
		$_SESSION['email']=$row["email"];
		$_SESSION['gender']=$row["gender"];
		$_SESSION['pic']=$row["propic"];
		}
		header('location:d1.html');
	}
	else 
    {
		echo "login failed try again";
		header('location:sign.html');
	}
		/*$sql="SELECT * FROM guardian WHERE donor_id='$id'";
	$result = $conn->query($sql);
	if ($result->num_rows==1) 
    {
        while($row = $result->fetch_assoc())
		{
			echo "guardian details";
			echo "<br>guardian name  ".$row["gname"]."<br> Relatioship  ".$row["relationship"]."<br>";
		$_SESSION['gname']=$row["gname"];
		$_SESSION['relationship']=$row["relationship"];
			
		}
	}*/
?>
