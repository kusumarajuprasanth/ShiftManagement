<?php
$db=null;
$conn=mysqli_connect("localhost","root","");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
{
	$db=mysqli_select_db($conn,"loyaltymethods");
	// echo"connection established";

}
?>

