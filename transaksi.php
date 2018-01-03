<?php
require_once 'include/connect.php';
//$db = new db_functions();
 
// json response array
$response = array("error" => FALSE);

if(isset($_POST['id_transaksi'])){
	$id_transaksi = $_POST['id_transaksi'];
	$sql="SELECT id_transaksi, transaksi.alamat AS alamat, nama_penjual, no_telp, jam_buka, jam_tutup, waktu_order, total_harga from penjual, transaksi JOIN jadwal_pengepul ON transaksi.jadwal_order = jadwal_pengepul.id_jadwal_pengepul JOIN list_jadwal ON jadwal_pengepul.id_jadwal = list_jadwal.id_jadwal where transaksi.id_transaksi='$id_transaksi'";
	$result = mysql_query($sql);
 
	$response["error"] = FALSE;
	while($transaksi=mysql_fetch_assoc($result)){
		$response["transaksi"][] = $transaksi;
	}
}else{
	$response = array("error" => TRUE);
}

echo json_encode($response);
?>