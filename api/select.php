<?php
header('Access-Control-Allow-Origin: * ');

include_once 'db_config/pcu_connect.php';



  $sql = "select (select hospitalcode from opdconfig) as hcode,
person_id,cid,concat(pname,fname,'  ',lname) as name,concat((select hospitalcode from opdconfig),cid) as checked from person limit 100";
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
//print_r($coursesArray) ;
//echo $results;
/*$fp = fopen('file4.json', 'w+');
fwrite($fp, json_encode($coursesArray));
fclose($fp);
 echo json_encode($coursesArray);
*/
    mysqli_close($link);

     foreach($coursesArray as $row) 
{
          $sqls = "INSERT INTO person_hdc(hcode, person_id,cid,name,checked ) VALUES ('".$row["hcode"]."', '".$row["person_id"]."', '".$row["cid"]."','".$row["name"]."','".$row["checked"]."')";       
      mysqli_query($link2, $sqls);       

}
echo "Insert OK" ;

    //close connection
    mysqli_close($link2);

?>
