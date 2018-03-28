<?php
$servername = "localhost";
$username = "organdonation";
$password = "donate@123";
$dbname = "donation";
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
	die("connection failed :" . $conn->connect_error);
}
$hname=$_POST['hname'];
$hemail=$_POST['hemail'];
$license_num=$_POST['hlicense'];
$phn=$_POST['hphno'];
$hpass=$_POST['psw'];
$hcity=$_POST['city'];
$hstate=$_POST['state'];
$hcountry=$_POST['country'];
$sql="INSERT INTO hospital(hop_name,license_num,email,phn_num,password,city,state,country)
VALUES('$hname','$license_num','$hemail','$phn','$hpass','$hcity','$hstate','$hcountry')";
if($conn->query($sql) === TRUE) {
    //echo "values inserted";
	header('location: hosp_log.html');
} else {
    echo "Error inserting values: " . $conn->error;
}