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

 

 

<form name="emp" action="creating_employe.php" method="post">
<table align="center" width=50% width="100%" cellspacing="2" cellpadding="2" border="5">
    <tr>
        <td colspan="2" align="center"><b>Employee Registration Form.</b></td>
        
    </tr>
    <tr>
        <td align="left" valign="top" width="41%">Employee Name<span style="color:red">*</span></td>
 
        <td width="57%"><input type="text" value="" name="emp_name" size="24"></td>
    </tr>
    <tr>
        <td align="left" valign="top" width="41%">Employee ID<span style="color:red">*</span></td>
        <td width="57%">
        <input type="text" value="" name="emp_id" onkeypress="return isNumberKey(event)"  size="24"></td>
    </tr>

    <tr >
 
        <td align="left" valign="top" width="41%">Contact Number<span style="color:red">*</span></td>
        <td width="57%">
        <input type="text" value="" onkeypress="return isNumberKey(event)" name="emp_contact" size="24"></td>
    </tr>
    
 
   
    <tr>
        <td align="left" valign="top" width="41%">Email<span style="color:red">*</span></td>
        <td width="57%">
        <input type="text" value="" name="email_id" size="24"></td>
    </tr>
	 <tr >
        <td align="left" valign="top" width="41%">Project<span style="color:red">*</span></td>
        <td width="57%">
<select name="project">
<option value="Default">Default</option>
<option value="LOYALTY">LOYALTY</option>
<option value="GSIT">GSIT</option>
<option value="EXA-DATA">EXA-DATA</option>
<option value="LIBRA">LIBRA</option>

 
</select></td>
        
 
    </tr>
	
	 <tr >
        <td align="left" valign="top" width="41%">TEAM<span style="color:red">*</span></td>
        <td width="57%">
<select name="Team_id">
<?php  $qry="SELECT distinct(`team_id`),`team_name` FROM `teams` WHERE 1";$rset=mysqli_query($conn,$qry);	             
				 while($res=mysqli_fetch_assoc($rset))
	             echo "<option value='{$res['team_id']}'>{$res['team_name']}</option>";
			    ?> 
</select>  <a href="create_team.php">Create_team</a>
           <a href="view_teams.php">View_teams</a></td>
        
 
    </tr>
    
    <tr>
        <td colspan="2">
        <p align="center">
        <input type="submit" value="  Submit" name="submit"  onsubmit="return validate_form();">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="  Reset All   " name="B5"></td>
    </tr>
 
</table>
</form>

 

			
	 </div>
		</div>
		<?php include 'footer.php'?>
		</div>
		
	</body>
<!-- *******************************************************  BODY  ************************************************************************ -->



</html>