<?php 
session_start();
error_reporting(0);
include('../../../resources/header.php');
require_once('../../../resources/DB/config.php');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_POST['ID'];
$sql = "DELETE FROM Files WHERE id='$id'";
$conn->query($sql);
unlink("../../../files/$id");
