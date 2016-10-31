<?php
header('Access-Control-Allow-Origin: * ');
 

include_once 'db_config/pcu_connect.php';

$data=json_decode(file_get_contents("php://input"));
$m=$link->real_escape_string($data->month);
$d=$link->real_escape_string($data->date);
$y=$link->real_escape_string($data->year);

 $dateOrder = $y.'-'.$m.'-'.$d ;
   $sql = "select lh.lab_order_number,vn,hn,order_date,report_date, reporter_name,confirm_report,
form_name, (select hospitalcode from opdconfig) as hcode,
(select concat(pname,fname,'  ',lname) from patient where hn = lh.hn ) as patient
from lab_head lh 
where ksn_check is null and order_date = '$dateOrder'
and confirm_report = 'N'
";
      
$resource = mysqli_query($link, $sql);
$count_row = mysqli_num_rows($resource);
$coursesArray = array();
if($count_row > 0) {
 while ($result = mysqli_fetch_assoc($resource)) {
//$rows[]=$result;
   $coursesArray[] = $result;
 }
 //$data = json_encode($rows);
//	$totaldata = sizeof($rows);
//	$results = '{"results":'.$data.'}';
//echo json_encode($coursesArray);
}else{
//  $foo->hello = "world";
//$coursesArray[]->hello = "world";
//echo json_encode($coursesArray);
//$coursesArray[] = name:'No Data' ;
}



//echo $results;
 echo json_encode($coursesArray);


?>