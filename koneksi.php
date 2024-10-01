<?php
$server = "localhost";
$username = "root";
$password = ""; 
$dbname = "sipuas";

$conn = mysqli_connect($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function get_Nilai($conn){
    $query = "SELECT * FROM sipuas ORDER BY timestamp DESC";
    $result = $conn->query($query);
    $rows = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    } 
    return $rows;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // var_dump($_POST);die;
    $nilai = $_POST["nilai"];
    $keterangan = isset($_POST["keterangan"]) ? $_POST["keterangan"] : null;

    $query = "INSERT INTO sipuas (nilai, keterangan) VALUES ('$nilai', '$keterangan')";
    $insert = $conn->query($query);

    if ($insert) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
} 

?>
