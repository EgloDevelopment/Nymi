<?php
session_start();
include('../../../../../resources/header.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$parent = $_GET['l'];
$name = $_POST['name'];
$owner = $_SESSION['owner-id'];
$id = getString(20);
$owner = $_SESSION['owner-id'];

require_once('../../../../../resources/DB/config.php');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo '<script>window.location.href = "../../../../../page?a=error";</script>';
}

$sql = "INSERT INTO `files`(`id`, `name`, `extension`, `parent`, `owner`, `sharing`) VALUES ('$id','$name','.folder','$parent','$owner','1')";

if ($conn->query($sql) === TRUE) {
    echo '<script>window.location.href = "../../../../../page?a=error";</script>';
} else {
    echo '<script>window.location.href = "../../../../../page?a=error";</script>';
}
}
?>

<div class="position-absolute top-50 start-50 translate-middle">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h1 class="center">Folder</h1>
            <br>
            <!--p class="center">Current name: <?php //echo $current 
                                                ?></p-->
            <form action="" method="POST"enctype="multipart/form-data">
                <input type="username" class="form-control" name="name" placeholder="Name">
                <br>
                <div class="center">
                    <button type="submit" class="btn btn-outline-primary">Create</button>
                </div>
            </form>
            <div class="center">
                <br>
                <button class="btn btn-outline-secondary" onclick="redir();">Back</button>
            </div>
        </div>
    </div>
</div>

<script>
    function redir() {
        window.location.href = "../../../../../";
    }
</script>