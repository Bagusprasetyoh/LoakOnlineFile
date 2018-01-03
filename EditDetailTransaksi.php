<?php
require_once 'include/connect.php';
//$db = new db_functions();
 
// json response array

if(isset($_POST['id_detail'])){
	$sql="UPDATE detail_transaksi SET berat = '$_POST[berat]' WHERE id_detail_transaksi='$_POST[id_detail]'";
	$result = mysql_query($sql);
	$response["error"] = FALSE;
}else{
	$response = array("error" => TRUE);
}
echo json_encode($response);
?>