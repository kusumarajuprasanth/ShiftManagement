<?php

// print_r($_POST);
include 'conn.php';
$qry="INSERT INTO `contacts`(`name`, `mobile`, `tier`, `project`, `email`) VALUES ('{$_POST['emp_name']}','{$_POST['emp_contact']}','{$_POST['Tier']}',
'{$_POST['Project']}','{$_POST['email_id']}')";

$res=mysqli_query($conn,$qry);
echo $res;
if($res==1)
{
	echo"<script>window.alert('Contact Created Successfully')</script>";
	
}
else{
		echo"<script>window.alert('Contact was NOT CREATED please contact DEV ')</script>";
}
 
   echo '<script>window.location="contacts.php"</script>';



?>