<?php
require_once 'include/connect.php';
//$db = new db_functions();
 
// json response array
$response = array("error" => FALSE);

if(isset($_POST['hari'])){
	$hari = $_POST['hari'];
	$sql="select * from list_jadwal where hari='$hari'";
	$result = mysql_query($sql);
	
	while($data=mysql_fetch_assoc($result)){
		$response["jadwal"][] = $data;
	}
	
}else{
	$response = array("error" => TRUE);
}

echo json_encode($response);
?>