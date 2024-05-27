<?php
$server = 'localhost';
$email = 'root';
$password = '';
$database = 'jobs';

if (isset($_POST))

    $conn = new mysqli($server, $email, $password, $database);
if ($conn) {
    // echo 'Server Connected Success';
} else {
    die(mysqli_error($conn));
}
?>