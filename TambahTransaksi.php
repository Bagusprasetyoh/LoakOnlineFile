<?php
require_once 'include/connect.php';
//$db = new db_functions();
 
// json response array
$response = array("error" => FALSE);

if(isset($_POST['id_produk'])){
	$id_produk = $_POST['id_produk'];
	$id_penjual = $_POST['id_penjual'];
	$sql = mysql_query("select max(id_transaksi) as id, status from transaksi where id_penjual='$id_penjual'");
	$data = mysql_fetch_assoc($sql);
	if($data['status']!="selesai"){
		$sql3 = mysql_query("INSERT into detail_transaksi(id_transaksi, id_produk, berat, harga) values('$data[id]', '$id_produk', '0', '0')");
	}else{
		if(count($data) == 0 ){
			$no = "00001";
		} else {
			$ambil_no = $data['id'];
			$pecah = substr($ambil_no, 5, 5);
			$tambah = $pecah + 1;
			$no="";
			for($i=strlen($tambah);$i<=5;$i++){
				if($i==5){
					$no = $no.$tambah;
				}else{
					$no = $no."0";
				}
			}
		}
		$tgl=date('ym');
		$data['id_transaksi'] = "T".$tgl.$no;
		$sql2 = mysql_query("INSERT into transaksi(id_transaksi, id_penjual, status) values('$data[id_transaksi]', '$id_penjual', 'keranjang')");
		$sql3 = mysql_query("INSERT into detail_transaksi(id_transaksi, id_produk, berat, harga) values('$data[id]', '$id_produk', '0', '0')");
	}
	$response["error"] = FALSE;
	echo json_encode($response);
} else {
	$response["error"] = TRUE;
	echo json_encode($response);
}
?>