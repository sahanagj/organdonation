<?php
$servername ="localhost";
$username ="organdonation";
$password ="donate@123";
$dbname ="donation";
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
	die("connection failed :" . $conn->connect_error);
}
$donor_id=$_POST['donorid'];
$doctor_id=$_POST['doctorid'];
$num_organs=$_POST['nor'];
$num_tissue=$_POST['ntr'];
$date=$_POST['date'];
$sql="INSERT INTO donation(donor_id	,doctor_id,num_of_organs_donated,num_of_tissues_donated,date_of_donation)
VALUES('$donor_id','$doctor_id','$num_organs','$num_tissue','$date')";
if($conn->query($sql) === TRUE) {
    //echo "values inserted";
	header('location: http://localhost/wtlab/pending_donation.php');
} else {
    echo "Error inserting values: " . $conn->error;
}
?>