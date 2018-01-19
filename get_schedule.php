<html>
<body  align='center'> 
<form action='' method='post' name='fm'>
Select your ID
<select name="lmid">
<?php 
include 'conn.php';
$qry=mysqli_query($conn,"SELECT  distinct `lmid` FROM `shiftschedule` WHERE 1");

while($res=mysqli_fetch_assoc($qry)){
	
	echo"<option value='".$res['lmid']."'>".$res['lmid']."</option>";
}
?>
</select> 

<input type='submit' name='sbt' value='Schedule Shifts'>
</form>

<?php

if(isset($_POST['sbt']) && isset($_POST['lmid'])){
	echo"<table border=1 align='center'>
 <th>Sno</th><th>LMID</th><th>Shift_Date</th><th>Shift_Timings</th>";
	$sno=1;
	$qry="select `lmid`, `shift_date`, `shift_timings` from shiftschedule where `lmid`='{$_POST['lmid']}' order by `id`";	
	// echo $qry;
	$result=mysqli_query($conn,$qry);
	while($res=mysqli_fetch_assoc($result)){
	
	echo "<tr><td>$sno</td><td>{$res['lmid']}</td><td>{$res['shift_date']}</td><td>{$res['shift_timings']}</td></tr>";
	 // print_r($res);
	// echo "<br>";
	$sno++;
	}
	
    
	echo"</table>";
	
	
	}



?>

</body>
<html>