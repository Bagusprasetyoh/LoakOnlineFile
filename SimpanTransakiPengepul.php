<?php
require_once 'include/connect.php';
//$db = new db_functions();
 
// json response array
$response = array("error" => FALSE);

if(isset($_POST['pengepul']) && isset($_POST['id_penjual'])){
	$id_penjual = $_POST['id_penjual'];
	$id_pengepul = $_POST['id_pengepul'];
	$sel = mysql_query("UPDATE FROM transaki SET id_pengepul = '$id_pengepul' WHERE id_penjual='$id_penjual' and status!='selesai'");
	$result = mysql_query($sql);
	$data = mysql_fetch_assoc($result);
	
	while($data=mysql_fetch_assoc($result)){
		$response["jadwal"][] = $data;
	}
	
}else{
	$response = array("error" => TRUE);
}

echo json_encode($response);
?>