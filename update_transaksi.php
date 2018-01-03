<?php
require_once 'include/connect.php';
//$db = new db_functions();
 
// json response array
$response = array("error" => FALSE);

if (isset($_POST['id_pengepul'])){
	$username = $_POST['id_pengepul'];
	$transaksi = $_POST['transaksi'];

	$sql="update transaksi set id_pengepul='$username', status='proses' where id_transaksi='$transaksi' ";
	$result = mysql_query($sql);
	$response["error"] = FALSE;
}else{
	$response["error"] = TRUE;
	$response["error_msg"] = "anda belum berhasil update, silahkan lakukan lagi!";
}

echo json_encode($response);
?>