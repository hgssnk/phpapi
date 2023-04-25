<div style="font-size: 200px; text-align: center;">Hello World!!</div>
<?php
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'mydb');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM mydb";
    $result = mysqli_query($conn, $sql);

    $response = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
