<?php
require_once 'include/connect.php';
//$db = new db_functions();
 
// json response array
$response = array("error" => FALSE);

$sql="select * from kategori_produk";
$result = mysql_query($sql);
 
$response["error"] = FALSE;
while($kategori=mysql_fetch_assoc($result)){
	$response["kategori"][] = $kategori;
}
echo json_encode($response);
?>