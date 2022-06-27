<?php
session_start();
include("../../../../../resources/header.php");
$name = $_POST['name'];
$owner = $_SESSION['owner-id'];
$id = getString(20);
$parent = $_POST['TO'];
$owner = $_SESSION['owner-id'];

require_once('../../../../../resources/DB/config.php');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `files`(`id`, `name`, `extension`, `parent`, `owner`, `sharing`) VALUES ('$id','$name','.folder','$parent','$owner','1')";

if ($conn->query($sql) === TRUE) {
    //$_SESSION['upload-action'] = 'success';
} else {
    //$_SESSION['upload-action'] = 'db-error';
}
