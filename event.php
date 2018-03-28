<!DOCTYPE html>
<html>
<head>
	<title>Event List</title>
</head>

<body style="background: url('bck.JPG');background-size: 120% 165%">
<?php
$con=mysqli_connect('localhost','root','','ska')or die(mysql_error());

?>
<h1 align="middle" style="color: #3366ff;font-size: 250%">ACARA</h1>
	<h3 align="middle" style="font-size: 200%;color:#c63939">Welcome!!</h3>

<table border="5" align="center">
	<tr >
		<td colspan="4" style="text-align: center;font-size: 150%;color:#512E5F" ><strong>Event List</strong> </td>
	</tr>
	<tr style="font-size: 125%">
		<td > <strong>Event</strong></td>
		<td><strong>Location</strong></td>
		<td><strong>Date</strong> </td>
		<td><strong>Price</strong> </td>
	</tr>
	<tr>
		<?php
		$q1="SELECT * FROM events";
		$res1=mysqli_query($con,$q1);
		while ($row=mysqli_fetch_array($res1)) {
		?>
		<td><?php echo $row['Name']; ?></td>
		<td><?php echo $row['Location']; ?></td>
		<td><?php echo $row['Date']; ?></td>
		<td><?php echo $row['Fee']; ?></td>
	</tr>
	</tr>	
	<?php
}?>
</table>
	<form action="#" method="POST"> 
		<select name="abc">
<?php
$q2="SELECT DISTINCT Location from events";
$res2=mysqli_query($con,$q2);
while ($row=mysqli_fetch_array($res2)) {
	?>
		<option>
			<?php
			echo $row['Location'];
			?>
		</option>
	<?php }?>
		</select>
		<input type="submit" name="GO">
	</form>
	<br>
	<br>
	
		<?php
		if (isset($_POST['GO'])) {
			
		
		$y=$_POST["abc"];
		$q1="SELECT * FROM events where Location='$y' ";
		$res1=mysqli_query($con,$q1);

		?>
	<table border="5" align="center">
	<tr >
		<td colspan="4" style="text-align: center;font-size: 150%;color:#512E5F" ><strong>Event List</strong> </td>
	</tr>
	<tr style="font-size: 125%">
		<td > <strong>Event</strong></td>
		<td><strong>Location</strong></td>
		<td><strong>Date</strong> </td>
		<td><strong>Price</strong> </td>
	</tr>
	<tr>
		<?php	while ($row=mysqli_fetch_array($res1)) {
		?>
	
		<td><?php echo $row['Name']; ?></td>
		<td><?php echo $row['Location']; ?></td>
		<td><?php echo $row['Date']; ?></td>
		<td><?php echo $row['Fee']; ?></td>
	</tr>
	</tr>	
	<?php
}
}

?>
</table>
</body>
</html>
