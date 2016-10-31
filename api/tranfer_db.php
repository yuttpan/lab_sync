<?
include "db_config/pcu_connect.php";
ini_set('max_execution_time', 8000);

$sql ="select lab_order_number,vn,hn,order_date,report_date, reporter_name,confirm_report,
form_name, (select hospitalcode from opdconfig) as hcode,
(select concat(pname,fname,'  ',lname) from patient where hn = lh.hn ) as patient,concat((select hospitalcode from opdconfig),lab_order_number) as hdc_lab_order
from lab_head lh 
where lab_order_number = '19165'
and confirm_report = 'N'
";

$sql2 = "update lab_head set ksn_check = 'y' where lab_order_number = '19165'" ;
$resource = mysqli_query($link, $sql);

$count_row = mysqli_num_rows($resource);
$coursesArray = array();
if($count_row > 0) {
 while ($result = mysqli_fetch_assoc($resource)) {

   $ps1=$result['lab_order_number'];
   $ps2=$result['vn'];
   $ps3=$result['hn'];
   $ps4=$result['order_date'];
   $ps5=$result['report_date'];
   $ps6=$result['reporter_name'];
   $ps7=$result['confirm_report'];
   
   $ps8=$result['form_name'];
   $ps9=$result['hcode'];
   $ps10=$result['patient'];
   $ps11=$result['hdc_lab_order'];


 }
$query = mysqli_query($link, $sql2);
if($query) {
	 echo "Record update successfully";
	}
}else{

}


/*
while ($dbarr_person=mysql_fetch_array($sql_person)){
	$ps1=$dbarr_person['hospitalcode'];
	$ps2=$dbarr_person['cid']; 
	$ps3=$dbarr_person['person_id']; 
	$ps4=$dbarr_person['house_id']; 
	$ps5=$dbarr_person['pname']; 
	$ps6=$dbarr_person['fname']; 
	$ps7=$dbarr_person['lname']; 
	$ps8=$dbarr_person['patient_hn']; 
	$ps9=$dbarr_person['sex']; 
	$ps10=$dbarr_person['birthdate']; 
	$ps11=$dbarr_person['address']; 
	$ps12=$dbarr_person['village_moo']; 
	$ps13=$dbarr_person['tu']; 
	$ps14=$dbarr_person['au']; 
	$ps15=$dbarr_person['cha']; 
	$ps16=$dbarr_person['marrystatus']; 
	$ps17=$dbarr_person['occupation']; 
	$ps18=$dbarr_person['citizenship']; 
	$ps19=$dbarr_person['nationality']; 
	$ps20=$dbarr_person['religion']; 
	$ps21=$dbarr_person['education']; 
	$ps22=$dbarr_person['home_position_id']; 
	$ps23=$dbarr_person['father_cid']; 
	$ps24=$dbarr_person['mother_cid']; 
	$ps25=$dbarr_person['s$ps_cid']; 
	$ps26=$dbarr_person['movein_date']; 
	$ps27=$dbarr_person['person_discharge_id']; 
	$ps28=$dbarr_person['discharge_date']; 
	$ps29=$dbarr_person['bloodgroup_rh']; 
	$ps30=$dbarr_person['person_labor_type_id']; 
	$ps31=$dbarr_person['village_code']; 
	$ps32=$dbarr_person['house_regist_type_id']; 
	$ps33=$dbarr_person['last_update'];
	*/
include "db_config/hdc_connect.php";
echo $sql_personExc="insert into lab_head (lab_order_number,vn,hn,order_date,report_date, reporter_name,confirm_report,
form_name,hcode,patient,hdc_lab_order_number) values ( '$ps1','$ps2','$ps3','$ps4','$ps5','$ps6','$ps7','$ps8','$ps9','$ps10','$ps11')
";
$exec = mysqli_query($link2,$sql_personExc);

if($exec) {
	 echo " update successfully";
	}

?>