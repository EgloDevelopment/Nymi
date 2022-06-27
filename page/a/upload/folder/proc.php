<?php
session_start();
include('../../../../resources/header.php');
require_once('../../../../resources/DB/config.php');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$count = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $string = getString(20);
    $parent = $_POST['TO'];
    $folderdname = $_POST['NAME'];
    $owner = $_SESSION['owner-id'];
    $sql1 = "INSERT INTO `files`(`id`, `name`, `extension`, `parent`, `owner`, `sharing`) VALUES ('$string','$folderdname','.folder','$parent','$owner','1')";
    if ($conn->query($sql1) === TRUE) {
        //$_SESSION['upload-action'] = 'success';
    } else {
        //$_SESSION['upload-action'] = 'db-error';
    }
    foreach ($_FILES['files']['name'] as $i => $name) {
        $temp = explode(".", $_FILES['files']['name'][$i]);
        $newname = getString(20) . '.' . end($temp);
        $sqlext = end($temp);
        if (strlen($_FILES['files']['name'][$i]) > 1) {

            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], '../../../../files/' . $newname)) {
                $sql2 = "INSERT INTO `files`(`id`, `name`, `extension`, `parent`, `owner`, `sharing`) VALUES ('$newname','$name','.$sqlext','$string','$owner','1')";


                if ($conn->query($sql2) === TRUE) {
                    //$_SESSION['upload-action'] = 'success';
                } else {
                    //$_SESSION['upload-action'] = 'db-error';
                }
                $count++;
            }
        }
    }
}
