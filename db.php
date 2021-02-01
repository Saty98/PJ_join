<?php

$con =  mysqli_connect("localhost","root","","join");
if (mysqli_connect_error()){
	die("There was an error connecting to the database");
}
$sql = "SELECT users.user_name,users.email,organizations.organization_name FROM users INNER JOIN organizations ON users.user_id = organizations.id WHERE organization_type =2 AND designation ='Visual Merchandiser'";
$result = mysqli_query($con,$sql);
if ($result) {
	# code...
	echo "Data fetched";
	echo "<table >";
		echo "<tr>";
		echo " <th> UserName </th><th>Email</th><th>Organization Name</th>";
		echo "</tr>";
		while ($d = mysqli_fetch_assoc($result)) {
			# code...
			echo "<tr>";
			echo "<td>".$d['user_name']."</td><td>".$d['email']."</td><td>".$d['organization_name']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}else{
		echo "nothing found";
	}
$sql2 = "SELECT users.user_name,organizations.organization_name FROM users LEFT JOIN organizations ON users.user_id = organizations.id WHERE user_id IN (5,7,10,11)";
$result2 = mysqli_query($con,$sql2);
if ($result2) {
	# code...
	echo "<table>";
		echo "<tr>";
		echo " <th> UserName </th><th>Organisation Name</th>";
		echo "</tr>";
		while ($d = mysqli_fetch_assoc($result2)) {
			# code...
			echo "<tr width='50%'>";
			echo "<td>".$d['user_name']."</td><td>".$d['organization_name']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
?>