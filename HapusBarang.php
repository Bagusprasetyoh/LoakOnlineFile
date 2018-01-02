<?php
require_once 'include/connect.php';
//$db = new db_functions();
 
// json response array
$response = array("error" => FALSE);

if(isset($_POST['id_detail'])){
	$id_detail = $_POST['id_detail'];

	$sql = mysql_query("DELETE FROM detail_transaksi where id_detail_transaksi='$id_detail'");
	
	$response["error"] = FALSE;
	echo json_encode($response);
} else {
	$response["error"] = TRUE;
	echo json_encode($response);
}
?>