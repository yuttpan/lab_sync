<?php
//connect to mysql db
include_once 'db_config/pcu_connect.php';

 $laborder_number = isset($_GET['var_laborder_number']) ? $_GET['var_laborder_number'] : null;

//$filename = 'labhead.json';
////$data = file_get_contents($filename);


//convert json object to php associative array

//$array = json_decode($data, true);
//$array2 = json_decode($data2, true);
$get_labhead = " select lh.lab_order_number,vn,hn,order_date,report_date, reporter_name,confirm_report, form_name,
 (select hospitalcode from opdconfig) as hcode, (select concat(pname,fname,' ',lname) from patient where hn = lh.hn ) as patient
  from lab_head lh where lab_order_number = '$laborder_number'";

$labhead = array();
$laborder = array();
$resource = mysqli_query($link, $get_labhead);
$num = mysqli_num_rows($resource);
$row = mysqli_fetch_array($resource);

if($num > 0 ){




$labhead[] = $row ;



}
   

   $sql = "INSERT INTO `lab_head`(`lab_order_number`, `vn`, `hn`, `order_date`, `report_date`, 
  `reporter_name`, `confirm_report`, `form_name`, `hcode`, `patient`)
   VALUES ('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]')";
   

   
    mysqli_query($link2, $sql);
    

$sql2 = "UPDATE lab_head set ksn_check = 'y' where lab_order_number = '$laborder_number'" ;
    mysqli_query($link, $sql2);
echo "success" ;

$sql3 = "select l.*,(select hospitalcode from opdconfig) as hcode from lab_order l where lab_order_number = '$laborder_number'";

$resource1 = mysqli_query($link, $sql3);
$num1 = mysqli_num_rows($resource1);
//$row1 = mysqli_fetch_array($resource1);

if($num1 > 0) {
 while ($result = mysqli_fetch_assoc($resource1)) {
//$rows[]=$result;
   
$value1 =  $result['lab_order_number'];
$value2 =  $result['lab_items_code'];
$value3=  $result['lab_order_result'];
$value4 =  $result['lab_order_remark'];
$value5 =  $result['staff'];
$value6 =  $result['confirm'];
$value7 =  $result['lab_items_name_ref'];
$value8=  $result['lab_items_normal_value_ref'];
$value9 =  $result['specimen_code'];
$value10 =  $result['lab_items_sub_group_code'];
$value11 =  $result['order_type'];
$value12 =  $result['item_cost'];
$value13=  $result['hos_guid'];
$value14 =  $result['staff_lock_result'];
$value15 =  $result['laborder_date'];
$value16 =  $result['abnormal_result'];
$value17 =  $result['hos_guid_ext'];
$value18=  $result['check_key'];
$value19 =  $result['lab_result_status'];
$value20 =  $result['kcheck'];
$value21 =  $result['update_datetime'];
$value22 =  $result['lab_hist_compare_type_id'];
 $value23 =  $result['hcode'];





 $sql4 ="INSERT INTO `lab_order`(`id`, `lab_order_number`, `lab_items_code`, `lab_order_result`, `lab_order_remark`, `staff`, `confirm`,
 `lab_items_name_ref`, `lab_items_normal_value_ref`, `specimen_code`,
  `lab_items_sub_group_code`, `order_type`, `item_cost`, `hos_guid`, `staff_lock_result`, 
  `laborder_date`, `abnormal_result`, `hos_guid_ext`, `check_key`, `lab_result_status`, `kcheck`,
   `update_datetime`, `lab_hist_compare_type_id`, `hcode`) VALUES (NULL,'$value1','$value2','$value3','$value4','$value5','$value6'
   ,'$value7','$value8','$value9','$value10','$value11','$value12','$value13','$value14','$value15','$value16','$value17',
   '$value18','$value19','$value20','$value21','$value22','$value23')";


 mysqli_query($link2, $sql4);
 }
 }





mysqli_close($link);
mysqli_close($link2);

?>
