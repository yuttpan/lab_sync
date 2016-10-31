<?php
//connect to mysql db
   include_once 'db_config/hdc_connect.php';

    $filename = 'file4.json';
    $data = file_get_contents($filename);   

    //convert json object to php associative array

    $array = json_decode($data, true);  

 foreach($array as $row) 
{
          $sql = "INSERT INTO person_hdc(hcode, person_id,cid,name,checked ) VALUES ('".$row["hcode"]."', '".$row["person_id"]."', '".$row["cid"]."','".$row["name"]."','".$row["checked"]."')";       
      mysqli_query($link2, $sql);       

}
echo "Insert OK" ;

    //close connection
    mysqli_close($link2);

