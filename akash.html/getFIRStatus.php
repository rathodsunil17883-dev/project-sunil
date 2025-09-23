<?php
header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "police_portal";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){ echo json_encode(["status"=>null]); exit; }

$firID = isset($_GET['fir']) ? $conn->real_escape_string($_GET['fir']) : "";
$sql = "SELECT status FROM fir_records WHERE fir_id='$firID' LIMIT 1";
$result = $conn->query($sql);

if($result->num_rows>0){
    $row = $result->fetch_assoc();
    echo json_encode(["status"=>$row['status']]);
}else{
    echo json_encode(["status"=>null]);
}

$conn->close();
?>
