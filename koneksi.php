<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "sipuas";

$conn = mysqli_connect($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function fetchData($conn, $query)
{
    $result = $conn->query($query);
    $rows = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }
    return $rows;
}

function get_AllNilai($conn)
{
    $query = "SELECT * FROM sipuas ORDER BY timestamp DESC LIMIT 10";
    return fetchData($conn, $query);
}
function get_JumlahNilai($conn)
{
    $query = "SELECT COUNT(*) AS count FROM sipuas";
    $result = fetchData($conn, $query);
    return $result[0]['count'];
}
function get_EachNilai($conn)
{
    $query = "SELECT nilai, COUNT(*) AS count FROM sipuas GROUP BY nilai";
    return fetchData($conn, $query);
}
function get_EachKeterangan($conn)
{
    $query = "SELECT keterangan, COUNT(*) AS count FROM sipuas
                WHERE keterangan IS NOT NULL AND keterangan <> ''
                GROUP BY keterangan;";
    return fetchData($conn, $query);
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