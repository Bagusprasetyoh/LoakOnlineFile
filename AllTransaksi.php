<?php
require_once 'include/connect.php';
//$db = new db_functions();
 
// json response array
$response = array("error" => FALSE);

if(isset($_POST['id_pengepul'])){
	$id_pengepul = $_POST['id_pengepul'];
	$sql = "SELECT * FROM transaksi, penjual WHERE id_pengepul='$id_pengepul' and status!='selesai'";
	$result = mysql_query($sql);
	
	while($data=mysql_fetch_assoc($result)){
		$response["transaksi"][] = $data;
	}
}else{
	$response = array("error" => TRUE);
}

echo json_encode($response);
?>