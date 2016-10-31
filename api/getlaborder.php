<?php
header('Access-Control-Allow-Origin: * ');
 

include_once 'db_config/pcu_connect.php';
$get_id = (isset($_GET['id'])) ? $_GET['id'] : '' ;



   $sql = "select * from lab_order
where lab_order_number = '$get_id'
";
       //$db2 = getConnected($db_host, $db_name, $db_user, $db_pass);
    //   foreach( $db->query($sql2) as $row){
    //     array_push($result,$row) ;
    //   };


    //  return json_encode($result);
         //echo json_encode($a->fetchAll(PDO::FETCH_OBJ));
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