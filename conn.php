<?php
$db=null;
$conn=mysqli_connect("localhost","root","");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
{
	$db=mysqli_select_db($conn,"a7249480_loyalty");
	 //echo"connection established";
//$conn=mysqli_connect("mysql8.000webhost.com","a5442309_loyalty","a5442309_root","prasanth560");

if (!$conn) {
	$conn=mysqli_connect("localhost","id3001999_root","prasanth560");
    $db=mysqli_select_db($conn,"id3001999_dev_starbucks");
	 if($conn){
		 echo"DEV database connected";
		}
		else{
			echo"both the databases are down";
		}
}


}
if ($conn) {
    echo"1";
}
?>

