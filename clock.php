<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Datepicker - Animations</title>
  <link rel="stylesheet" href="css/css/jquery-ui.css">
  <script src="css/css/jquery-1.10.2.js"></script>
  <script src="css/css/jquery-ui.js"></script>
  <link rel="stylesheet" href="/css/css/style1.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
	 $( "#datepicker" ).datepicker( "option", "showAnim","slide");
	  $( "#datepicker" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
  });
  </script>
</head>
<body>
 
<p>Date: <input type="text" id="datepicker" size="30"></p>
 
</p>
 
 
</body>
</html>