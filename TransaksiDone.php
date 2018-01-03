<?php
require_once 'include/connect.php';
//$db = new db_functions();
 
// json response array
$response = array("error" => FALSE);

if(isset($_POST['transaksi'])){
	$sql = "SELECT * FROM detail_transaksi JOIN produk ON detail_transaksi.id_produk = produk.id_produk WHERE id_transaksi='$_POST[transaksi]'";
	$result = mysql_query($sql);
	
	$total=0;
	while($data=mysql_fetch_assoc($result)){
		$harga = $data['harga_standar'] * $data['berat'];
		$total+=$harga;
		$sql=mysql_query("UPDATE detail_transaksi SET harga = '$harga' WHERE id_detail_transaksi='$data[id_detail_transaksi]'");
	}
	
	$tgl = date('Y-m-d');
	$sql="UPDATE transaksi SET status = 'selesai', total_harga='$total', waktu_transaksi='$tgl' WHERE id_transaksi='$_POST[transaksi]'";
	$result = mysql_query($sql);
	$response["error"] = FALSE;
}else{
	$response = array("error" => TRUE);
}
echo json_encode($response);
?>