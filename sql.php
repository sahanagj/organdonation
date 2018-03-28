<?php
$servername = "localhost";
$username = "organdonation";
$password = "donate@123";
$dbname = "donation";
//$donorname = $_POST['donor_name'];
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
	die("connection failed :" . $conn->connect_error);
}

echo "connected succesfully.";
//get the number from the file

$uniq = file_get_contents('count.txt');
echo $uniq;
//add +1
$id = $uniq + 1 ;
// add that new value to text file again for next use
file_put_contents('count.txt', $id);
$donor_id=$id;
$name=$_POST['donorfname'];
$lname=$_POST['donorlname'];
$dob=$_POST['dateofbirth'];
$email=$_POST['email'];
$propic=$_POST['propic'];
$adhaar=$_POST['adhar'];
$pass=$_POST['password'];
$cpass=$_POST['cpass'];
$phn=$_POST['pho'];
$gen=$_POST['gender'];
$ad1=$_POST['addone'];
$ad2=$_POST['addtwo'];
$city=$_POST['city'];
$state=$_POST['state'];
$country=$_POST['cnt'];
$gname=$_POST['gfname'];
$gemail=$_POST['gemail'];
$gcontact=$_POST['gnum'];
$gender=$_POST['gend'];
$relationship=$_POST['grel'];
$gad1=$_POST['gadd1'];
$gad2=$_POST['gadd2'];
$gcity=$_POST['gcity'];
$gstate=$_POST['gstate'];
$gcountry=$_POST['gcnt'];
$blood_grp=$_POST['blood'];
$organ=$_POST['organ'];
$tissue=$_POST['tissue'];
$weight=$_POST['weight'];
/*
$sql = "CREATE TABLE donor
( donor_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(20) NOT NULL,
dob TIMESTAMP NOT NULL,
email VARCHAR(30),
contact INT(10) NOT NULL,
gender VARCHAR(1),
address VARCHAR(100)
)";
if($conn->query($sql) === TRUE) {
    echo "Table donor created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
$sql = "ALTER TABLE donor
ADD country VARCHAR(50)";
if($conn->query($sql) === TRUE) {
    echo "COLUMN ALTERD";
} else {
    echo "Error ALTERING column: " . $conn->error;
}
$conn->close();
$sql="INSERT INTO donor(name,dob,email,contact,gender,address,address2,city,state,country,propic)
VALUES('$name','$dob','$email','$phn','$gen','$ad1','$ad2','$city','$state','$country','$pics')";
if($conn->query($sql) === TRUE) {
    echo "values inserted";
} else {
    echo "Error inserting values: " . $conn->error;
}
$conn->close();
$sql = "SELECT * FROM donor";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "name ".$row["name"]." <br>dob: " . $row["dob"]. "<br>email " . $row["email"]."<br>";
} }
else {
    echo "0 results";
}
$conn->close();
$sql = "CREATE TABLE guardian
(guardian INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
gname VARCHAR(20) NOT NULL,
gemail VARCHAR(30),
gcontact INT(10) NOT NULL,
gender VARCHAR(1),
relationship VARCHAR(50),
gadress1 VARCHAR(50),
gadress2 VARCHAR(50),
gcity VARCHAR(50),
gstate VARCHAR(50),
gcountry VARCHAR(50)
)";
if($conn->query($sql) === TRUE) {
    echo "Table donor created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
$sql= "ALTER TABLE guardian
ADD CONSTRAINT FK_donorid
FOREIGN KEY(donor_id) REFERENCES donor(donor_id)";	
if($conn->query($sql) === TRUE) {
    echo "foreign key created successfully";
} else {
    echo "Error creating foreign key: " . $conn->error;
}
$conn->close();*/
$sql="INSERT INTO donor(donor_id,name,lname,dob,email,password,confirm_password,contact,gender,adhaar,address,address2,city,state,country,propic)
VALUES('$donor_id','$name','$lname','$dob','$email','$pass','$cpass','$phn','$gen','$adhaar','$ad1','$ad2','$city','$state','$country','$propic')";
if($conn->query($sql) === TRUE) {
    //echo "values inserted";
} else {
    echo "Error inserting values: " . $conn->error;
}
$sql="INSERT INTO guardian(gname,gemail,gcontact,relationship,gender,gadress1,gadress2,gcity,gstate,gcountry,donor_id)
VALUES('$gname','$gemail','$gcontact','$relationship','$gender','$gad1','$gad2','$gcity','$gstate','$gcountry','$donor_id')";
if($conn->query($sql) === TRUE) {
} else {
    echo "Error inserting values: " . $conn->error;
}
$sql="INSERT INTO medical(blood_grp,weight,organ,tissue,donor_id)
VALUES('$blood_grp','$weight','$organ','$tissue','$donor_id')";
if($conn->query($sql) === TRUE) {
    header('location: sign.html');
} else {
    echo "Error inserting values: " . $conn->error;
}

?>
