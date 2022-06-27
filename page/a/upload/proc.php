<?php
session_start();
$parent = $_POST['TO'];
$owner = $_SESSION['owner-id'];
include("../../../resources/header.php");
$dir = "../../../files";
$filename = $dir . '/' . basename($_FILES['Upload']['name']);
$sqlname = basename($_FILES['Upload']['name']);
$temp = explode(".", $_FILES["Upload"]["name"]);
$newfilename = getString(20) . '.' . end($temp);
echo "<br><br>";
if (move_uploaded_file($_FILES['Upload']['tmp_name'], "../../../files/" . $newfilename)) {
    //echo '<meta http-equiv="refresh" content="0; ../../../">';
} else {
    echo "Upload failed";
}
echo end($temp);

require_once('../../../resources/DB/config.php');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlext = end($temp);

$sql = "INSERT INTO `files`(`id`, `name`, `extension`, `parent`, `owner`, `sharing`) VALUES ('$newfilename','$sqlname','.$sqlext','$parent','$owner','1')";

if ($conn->query($sql) === TRUE) {
    //$_SESSION['upload-action'] = 'success';
} else {
    //$_SESSION['upload-action'] = 'db-error';
}
