<?php
require_once 'include/connect.php';
//$db = new db_functions();
 
// json response array
$response = array("error" => FALSE);

if(isset($_POST['user'])){
	$user = $_POST['user'];
	$id_jadwal = $_POST['id_jadwal'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$alamat = $_POST['alamat'];
	
	/*$jadwal = mysql_query("Select * from jadwal_pengepul where id_jadwal='$id_jadwal'");
	$hasil = mysql_fetch_row($jadwal);*/
		
	$sql = "SELECT * FROM jadwal_pengepul AS j JOIN (SELECT * , ( 3959 * ACOS( COS( RADIANS(  '$latitude' ) ) * COS( RADIANS(  `latitude` ) ) * COS( RADIANS(  `longitude` ) - RADIANS(  '$longitude' ) ) + SIN( RADIANS( '$latitude' ) ) * SIN( RADIANS(  `latitude` ) ) ) ) AS distance FROM pengepul HAVING distance <5) AS p ON j.id_pengepul = p.id_pengepul WHERE id_jadwal = '$id_jadwal' GROUP BY p.id_pengepul ORDER BY distance ASC";
	
	$result = mysql_query($sql);
	
	while($data=mysql_fetch_assoc($result)){
		$response["pengepul"][] = $data;
	}
	
}else{
	$response = array("error" => TRUE);
}

echo json_encode($response);
?>