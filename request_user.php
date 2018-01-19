<html>
<head>
<link rel="icon" href="images\sbux.ico" type="image/gif" sizes="32x32">
<title>Creating New employee </title>
<script>
</script>

</head>
<center>
<body bgcolor="#A3FF86">
<link rel="stylesheet" type="text/css" href="dist/jquery-clockpicker.min.css">
<form method="post" name='fm' id='fm' action="">
<table><i>
<tr><td><h2>Request User Access</h2></td></tr>
</table>

<table border='0'>

<tr></tr>

					 
<tr ><td>First Name</td><td><input type='text' name="firstname" placeholder="First Name"></td> </tr>
<tr><td>Last Name</td><td><input type='text' name="lastname" placeholder="Last Name"></td>  </tr>
<tr ><td>LM - ID</td><td><input type='text' name="LMID" placeholder="LM-ID"></td>  </tr>
<tr ><td>Mobile</td><td><input type='text' name="Mobile" placeholder="Mobile"></td>  </tr>					 
<tr ><td>Email -Id</td><td><input type='text' name="Email" placeholder="Email -Id"></td>  </tr>					   
	   
				   
<tr><td></td>
<td> <input type='submit' name='sbt' value="Request for Access" onclick="return fun()"></td> <td></td> <td><input type="reset" ></td></tr>

</table>


<?php
if(isset($_POST['sbt'])){
include 'conn.php';
$res=mysqli_query($conn,"INSERT INTO `req_access`(`lmid`, `firstname`, `lastname`, `mobile`, `emailid`) VALUES ('{$_POST['LMID']}','{$_POST['firstname']}','{$_POST['lastname']}','{$_POST['Mobile']}','{$_POST['Email']}')");
	if($res==1){
		Echo"<script> alert('Request sent successfully');</script>";
		Echo"Request sent successfully";
	}
	else{
		Echo"<script> alert('Request already generated or error loading'); </script>";
					
	}
	
	
}


?>

</form>
</body>
</center>
</html>