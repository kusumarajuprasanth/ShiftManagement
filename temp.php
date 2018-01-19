<!DOCTYPE html>
<html>
<body>

<?php
function date_diff1($date1,$date2){

$diff = strtotime($date2) - strtotime($date1);

$diffr['years'] = floor($diff / (365*60*60*24));
$diffr['months'] = floor(($diff - $diffr['years'] * 365*60*60*24) / (30*60*60*24));
$diffr['days'] = floor(($diff - $diffr['years'] * 365*60*60*24 - $diffr['months']*30*60*60*24)/ (60*60*24));

return $diffr;
}

$day=date_diff1("2014-12-15","2014-12-17");
echo $day['days'];



// $date1=date_create("2013-12-15"); // select max(date) from shift schedule;

// $date2=date_create("2013-12-12"); // select max(date) from shift schedule where lmid='lmid';
// $days=10;
// $date1 = "2013-12-12";
// $date1= date('Y-m-d', strtotime($date1. ' +'.$days.' days'));
// $date1=date_create($date1);
// $diff=date_diff($date2,$date1); //d1-d2
// $dif=$diff->format("%a");

// var_dump($dif);
// $date2=date('Y-m-d', strtotime('today'));
// var_dump(date_create( $date2));

// $date1 = "2015-06-2";
// $date2 = "2016-06-26";

// $diff = abs(strtotime($date2) - strtotime($date1));

// $years = floor($diff / (365*60*60*24));
// $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
// $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

// printf("%d years, %d months, %d days\n", $years, $months, $days);



?>

</body>
</html>