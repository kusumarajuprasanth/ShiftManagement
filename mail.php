
<?PHP 
set_time_limit(100);
//mail('chennaiah.madagoni@gmail.com','test','test meassage');
?>
<html>
<body>
<form action="" name="fm" method="post">
to:<input type="text" name='to'>
<br>
subject<input type="text" name="subject">
<br>
message<textarea name="message" rows="15" cols="20"></textarea>
<input type="submit" value="send" name="send">
</form>
</body>
</html>
<?php
if(isset($_POST['send']))
{
mail($_POST['to'],$_POST['subject'],$_POST['message']);
}
?>