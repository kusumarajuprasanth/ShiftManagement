<head>
<link rel="icon" href="images\sbux.ico" type="image/gif" sizes="32x32">
</head>

<?php
include 'conn.php';
//print_r($_POST);
?><img src='images\BLoader.GIF'>Working on it......</img><?php
$qry="INSERT INTO `shifts`(`shiftname`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun`, `monis`, `tueis`, `wedis`, `thuis`, `friis`, `satis`, `sunis`) VALUES (
'{$_POST['shiftname']}',
'{$_POST['mos']} - {$_POST['moe']}',
'{$_POST['tus']} - {$_POST['tue']}',
'{$_POST['wes']} - {$_POST['wee']}',
'{$_POST['ths']} - {$_POST['the']}',
'{$_POST['frs']} - {$_POST['fre']}',
'{$_POST['sas']} - {$_POST['sae']}',
'{$_POST['sus']} - {$_POST['sue']}',
'{$_POST['monis']}','{$_POST['tueis']}',
'{$_POST['wedis']}','{$_POST['thuis']}',
'{$_POST['friis']}','{$_POST['satis']}','{$_POST['sunis']}')";
 print_r( $qry);


$res=mysqli_query($conn,$qry);
echo $res;
if($res==1)
{
	echo"<script>window.alert('Shift Created Successfully')</script>";
	
}
else{
		echo"<script>window.alert('SHIFT NOT CREATED please contact DEV ')</script>";
}
   echo '<script>window.location="creatingshift.php"</script>';


?>