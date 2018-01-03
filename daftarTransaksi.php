<?php
require_once 'include/connect.php';
//$db = new db_functions();
 
// json response array
$response = array("error" => FALSE);

if(isset($_POST['id_transaksi'])){
	$sql="SELECT * FROM detail_transaksi JOIN produk ON detail_transaksi.id_produk = produk.id_produk WHERE id_transaksi='$_POST[id_transaksi]'";
	$result = mysql_query($sql);
	$response["error"] = FALSE;
	while($detail_transaksi=mysql_fetch_assoc($result)){
		$response["detail_transaksi"][] = $detail_transaksi;
	}
}else{
	$response = array("error" => TRUE);
}
echo json_encode($response);
?>