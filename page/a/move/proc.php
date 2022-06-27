<?php
session_start();
include('../../../resources/header.php');
require_once('../../../resources/DB/config.php');

$new = $_POST['ID'];
$id = $_POST['File'];


$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE `files` SET `parent`='$new' WHERE id = '$id'";
$conn->query($sql);
