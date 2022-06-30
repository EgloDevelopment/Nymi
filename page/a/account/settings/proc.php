<?php
session_start();
include('../../../../resources/header.php');
require_once('../../../../resources/DB/config.php');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_POST['view'] == 'option1') {
    $viewvalue = '1';
    $_SESSION['view-option'] = 'grid';
} else {
    $viewvalue = '2';
    $_SESSION['view-option'] = 'list';
}

$id = $_SESSION['id'];
$sql = "UPDATE `Users` SET `view`='$viewvalue' WHERE id = '$id'";
$conn->query($sql);
