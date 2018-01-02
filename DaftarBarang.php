<?php
require_once 'include/connect.php';
//$db = new db_functions();
 
// json response array
$response = array("error" => FALSE);

if(isset($_POST['id_penjual'])){
	$id_penjual = $_POST['id_penjual'];
	$sql="select * from transaksi where id_penjual='$id_penjual' and status!='selesai'";
	$result = mysql_query($sql);
	$data = mysql_fetch_assoc($result);
	
	$sql=mysql_query("SELECT * FROM detail_transaksi JOIN produk ON detail_transaksi.id_produk = produk.id_produk WHERE id_transaksi='$data[id_transaksi]'");
	while($data=mysql_fetch_assoc($sql)){
		$response["barang"][] = $data;
	}
	
}else{
	$response = array("error" => TRUE);
}

echo json_encode($response);
?>