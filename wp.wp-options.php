<?php
require_once('wp-config.php');

$servername = DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;
$dbname = DB_NAME;

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM wp_options";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["option_id"]. " - Name: " . $row["option_name"]. " " . $row["option_value"]." " . $row["autoload"]. "<br>";
    }
} else {
    echo "0 results";
}


mysqli_close($conn);
?>
