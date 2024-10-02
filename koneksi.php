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

function get_AllNilai($conn, $month = null, $year = null)
{
    $query = "SELECT * FROM sipuas";
    if ($month && $year) {
        $query .= " WHERE MONTH(timestamp) = $month AND YEAR(timestamp) = $year";
    }
    $query .= " ORDER BY timestamp DESC LIMIT 10";
    return fetchData($conn, $query);
}

function get_JumlahNilai($conn, $month = null, $year = null)
{
    $query = "SELECT COUNT(*) AS count FROM sipuas";
    if ($month && $year) {
        $query .= " WHERE MONTH(timestamp) = $month AND YEAR(timestamp) = $year";
    }
    $result = fetchData($conn, $query);
    return $result[0]['count'];
}

function get_EachNilai($conn, $month = null, $year = null)
{
    $query = "SELECT nilai, COUNT(*) AS count FROM sipuas";
    if ($month && $year) {
        $query .= " WHERE MONTH(timestamp) = $month AND YEAR(timestamp) = $year";
    }
    $query .= " GROUP BY nilai";
    return fetchData($conn, $query);
}

function get_EachKeterangan($conn, $month = null, $year = null)
{
    $query = "SELECT keterangan, COUNT(*) AS count FROM sipuas
                WHERE keterangan IS NOT NULL AND keterangan <> ''";
    if ($month && $year) {
        $query .= " AND MONTH(timestamp) = $month AND YEAR(timestamp) = $year";
    }
    $query .= " GROUP BY keterangan";
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