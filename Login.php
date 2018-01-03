<?php
require_once 'include/connect.php';
//$db = new db_functions();
 
// json response array
$response = array("error" => FALSE);
if (isset($_POST['username']) && isset($_POST['password'])) {
 
    // receiving the post params
    $username = $_POST['username'];
    $password = $_POST['password'];
	$status = $_POST['status'];

    // get the user by email and password
	$sql="select * from user where username='$username' and password='$password' and status='$status'";
    $result = mysql_query($sql);
	$user=mysql_fetch_array($result);
 
    if ($user != false) {
        // use is found
        $response["error"] = FALSE;
        $response["user"]["uid"] = $user["id"];
        $response["user"]["username"] = $user["username"];
		$response["user"]["status"] = $user["status"];
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Login credentials are wrong. Please try again!";
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters email or password is missing!";
    echo json_encode($response);
}
?>