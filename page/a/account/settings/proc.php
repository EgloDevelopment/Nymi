<?php
session_start();
include('../../../../resources/header.php');
require_once('../../../../resources/DB/config.php');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_POST['2fa'] == 'option1') {
    $favalue = '2';
    $_SESSION['2fa-enabled'] = 'true';
} else {
    $favalue = '1';
    $_SESSION['2fa-enabled'] = 'false';
}

if ($_POST['view'] == 'option1') {
    $viewvalue = '1';
    $_SESSION['view-option'] = 'grid';
} else {
    $viewvalue = '2';
    $_SESSION['view-option'] = 'list';
}

$id = $_SESSION['id'];
$sql = "UPDATE `Users` SET `2fa`='$favalue', `dark`='$darkvalue', `view`='$viewvalue' WHERE id = '$id'";
$conn->query($sql);
