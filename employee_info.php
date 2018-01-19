<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Loyalty Methods</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<!-- *******************************************************  BODY  ************************************************************************ -->

<body>
	<div id="background">
		<div id="page">
			
			<?php include 'header.php'?>
			<?php include 'conn.php'?>
			
			
			<div id="contents">

 

 

<form name="emp" action="updating_employ.php" method="post">
<?php 
if (!isset($_SESSION)){session_start();} 


if($_POST['lmid']== null){
	echo"<script>window.alert('Please select Employee  ')</script>";
    echo '<script>window.location="update_employ.php"</script>';
	}else{
// print_r($_POST);

$qry="SELECT `id`,`lmid`, `name`, `mobile`, `project`, `Team_id`, `shiftsapplicable`,`email_id` FROM `employ` where `lmid`='{$_POST['lmid']}'";
$reset=mysqli_query($conn,$qry);
$res=mysqli_fetch_assoc($reset);
$_SESSION['id']=$res['id'];
$_SESSION['lmid']=$res['lmid'];
$_SESSION['name']=$res['name'];
$_SESSION['mobile']=$res['mobile'];
$_SESSION['project']=$res['project'];
$_SESSION['Team_id']=$res['Team_id'];
$_SESSION['email_id']=$res['email_id'];


echo $_SESSION['lmid'];



?>
<table align="center" width=50% width="100%" cellspacing="2" cellpadding="2" border="5">

<input type="text" <?php echo "value='{$_SESSION['id']}'";?> name="id" size="24" hidden>
    <tr>
        <td colspan="2" align="center"><b>Employee Updation Form.</b></td>
        
    </tr>
    <tr>
        <td align="left" valign="top" width="41%">Employee Name<span style="color:red">*</span></td>
 
        <td width="57%">
	   <input type="text" <?php echo "value='{$_SESSION['name']}'";?> name="emp_name" size="24"></td>
    </tr>
    <tr>
        <td align="left" valign="top" width="41%">Employee ID<span style="color:red">*</span></td>
        <td width="57%">
        <input type="text" <?php echo "value='{$_SESSION['lmid']}'";?> name="emp_id" size="24"></td>
    </tr>

    <tr >
 
        <td align="left" valign="top" width="41%">Contact Number<span style="color:red">*</span></td>
        <td width="57%">
        <input type="text" <?php echo "value='{$_SESSION['mobile']}'";?>  name="emp_contact" size="24"></td>
    </tr>
    
 
   
    <tr>
        <td align="left" valign="top" width="41%">Email<span style="color:red">*</span></td>
        <td width="57%">
        <input type="text" <?php echo "value='{$_SESSION['email_id']}'";?> name="email_id" size="24"></td>
    </tr>
	 <tr >
        <td align="left" valign="top" width="41%">Project<span style="color:red">*</span></td>
        <td width="57%">
		
<select name="project">


<option value="Default">Default</option>
<option value="LOYALTY" <?php if($_SESSION['project']=="LOYALTY") echo "selected"?> >LOYALTY</option>
<option value="GSIT" <?php if($_SESSION['project']=="GSIT") echo "selected"?> >GSIT</option>
<option value="EXA-DATA"<?php if($_SESSION['project']=="EXA-DATA") echo "selected"?> >EXA-DATA</option>
<option value="LIBRA"<?php if($_SESSION['project']=="LIBRA") echo "selected"?> >LIBRA</option>

 
</select></td>
        
 
    </tr>
	
	 <tr >
        <td align="left" valign="top" width="41%">TEAM<span style="color:red">*</span></td>
        <td width="57%">
<select name="Team_id">
<?php  $qry="SELECT distinct(`team_id`),`team_name` FROM `teams` WHERE 1";
       $rset=mysqli_query($conn,$qry);	             
				 while($res=mysqli_fetch_assoc($rset)){
	             echo "<option value='{$res['team_id']}'";
			     if($_SESSION['Team_id'] == $res['team_id'])
				 { echo " selected ";}
				 echo ">{$res['team_name']}</option>";
				 }
			    ?> 
</select>  <a href="create_team.php">Create_team</a>
           <a href="view_teams.php">View_teams</a></td>
        
 
    </tr>
    
    <tr>
        <td colspan="2">
        <p align="center">
		
		
        <input type="submit" value="Update Info" name="submit">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="  Reset All   " name="B5"></td>
    </tr>
 
</table>
</form>

 

			
	 </div>
		</div>
		<?php 
	}include 'footer.php'?>
		</div>
		
	</body>
<!-- *******************************************************  BODY  ************************************************************************ -->



</html>