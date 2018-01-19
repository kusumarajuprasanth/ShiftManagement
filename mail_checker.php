
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Loyalty Methods</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="dist/jquery-clockpicker.min.css">
</head>
<!-- *******************************************************  BODY  ************************************************************************ -->

<body>
	<div id="background">
		<div id="page">
			
			<?php include 'header.php'?>
			<?php include 'conn.php'?>
			
			<div id="contents">
				<div class="box">
					<div>
						<div class="body">
							
							
				
				<h2>
										<table cellpadding=6px border=1>		
									<tbody>
									<th> exp_time</th> <th> arr_time</th><th>Summary</th> <th>comments</th><th>Actions</th>
									<form method='post' name='actions' action=''>	
									
										<?php 									
										
										$qry="SELECT `cll_id`,`cl_id`,`exp_time`, `arr_time`, `verified_by`, `comments` FROM `checklist_log` WHERE `status`='' and `date`='".date('Y-m-d')."'";
										 // echo $qry;
										 $resset=mysqli_query($conn,$qry);
										 while($row=mysqli_fetch_assoc($resset)){
                                            $qry2="SELECT `task_desc` FROM `checklist` WHERE `cl_id`={$row['cl_id']}";
											$rset2=	mysqli_query($conn,$qry2);
											$row2=mysqli_fetch_assoc($rset2);
											
											$cll_id=$row['cll_id'];
											$time=$cll_id.'_time';
											$comments=$cll_id.'_comments';
											
											  echo "<tr>
											  
											  <td>{$row['exp_time']}</td> 
											  
											  <td>											  
											  <div class='input-group clockpicker'><input type='text' name='{$time}' placeholder='HH:MM' size='5'><span class='input-group-addon'><span class='glyphicon glyphicon-time'></span></span></div>  
											  </td>
											  
											  <td>{$row2['task_desc']}</td> 
											  
											  <td><input type='text' name='{$comments}'></td>
											  
											  <td>												
											  <button value='{$row['cll_id']}' width='30' height='30' name='prst' type='submit'><img src='images\prst.jpg' width='30' height='30'></button>
											  
											  <button value='{$row['cll_id']}' width='30' height='30' name='prst_with_err' type='submit'><img src='images\prst_with_err.jpg' width='30' height='30'></button>
											  
											   <button value='{$row['cll_id']}' width='30' height='30' name='prst_not' type='submit'><img src='images\prst_not.jpg' width='30' height='30'></button>						  
											  </td>
											  
											  
											  
											  
											  </tr>";
											  // print_r($row);
											 
										  }
																			
										if(isset($_POST['prst']))
										{
											$cll_id=$_POST['prst'];
											// print_r($_POST);
																					
											$time=$cll_id.'_time';
											$time_val=$_POST[$time];
											
											$comments=$cll_id.'_comments';
											$comments_val=$_POST[$comments];
											
											
											echo "<script>alert('{$cll_id}');</script>";
											echo "<script>alert('{$time_val}');</script>";
											echo "<script>alert('{$comments_val}');</script>";
											
										}
										
										if(isset($_POST['prst']))
										{
											$cll_id=$_POST['prst'];
											// print_r($_POST);
																					
											$time=$cll_id.'_time';
											$time_val=$_POST[$time];
											
											$comments=$cll_id.'_comments';
											$comments_val=$_POST[$comments];
											
											
											echo "<script>alert('{$cll_id}');</script>";
											echo "<script>alert('{$time_val}');</script>";
											echo "<script>alert('{$comments_val}');</script>";
											
										}

										
										
										
										
										
										
										?>
									</tbody>
									
									
									</table>
								
							<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="dist/jquery-clockpicker.min.js"></script>


<script type="text/javascript">
$('.clockpicker').clockpicker({
    placement: 'bottom',
    align: 'left',
    donetext: 'Done'
});
</script>
							
						
					</div>
				</div>
			</div>
		</div>
		</div>
		
		<?php include 'footer.php'?>
		
	
</body>
</html>