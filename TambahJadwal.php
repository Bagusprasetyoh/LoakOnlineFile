<?php
require_once 'include/connect.php';
//$db = new db_functions();
 
// json response array
$response = array("error" => FALSE);

if(isset($_POST['id_pengepul']) && isset($_POST['id_jadwal'])){
	$sql = "INSERT INTO jadwal_pengepul(id_pengepul, id_jadwal) values('$_POST[id_pengepul]', '$_POST[id_jadwal]')";
	$result = mysql_query($sql);
	$response["error"] = FALSE;
}else{
	$response = array("error" => TRUE);
}
echo json_encode($response);
?>