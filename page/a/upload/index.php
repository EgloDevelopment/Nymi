<?php
session_start();
include('../../../resources/header.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$parent = $_GET['l'];
$owner = $_SESSION['owner-id'];
$size = ($_FILES['Upload']['size'] / 1000000);
$dir = "../../../files";
$filename = $dir . '/' . basename($_FILES['Upload']['name']);
$sqlname = basename($_FILES['Upload']['name']);
$temp = explode(".", $_FILES["Upload"]["name"]);
$newfilename = getString(20) . '.' . end($temp);
echo "<br><br>";
if (move_uploaded_file($_FILES['Upload']['tmp_name'], "../../../files/" . $newfilename)) {
    //echo '<meta http-equiv="refresh" content="0; ../../../">';
} else {
    echo 'Move error.';
}
echo end($temp);

require_once('../../../resources/DB/config.php');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo '<script>window.location.href = "../../../page?a=error";</script>';
}

$sqlext = end($temp);

$sql = "INSERT INTO `files`(`id`, `name`, `extension`, `parent`, `owner`, `mbsize`, `sharing`) VALUES ('$newfilename','$sqlname','.$sqlext','$parent','$owner','$size', '1')";

if ($conn->query($sql) === TRUE) {
    echo '<script>window.location.href = "../../../";</script>';
} else {
    echo '<script>window.location.href = "../../../page?a=error";</script>';
}
}
?>

<div class="position-absolute top-50 start-50 translate-middle">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h1 class="center">Upload</h1>
            <br>
            <div id="iframeHolder"></div>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="Upload">
                <br>
                <div class="center">
                    <button type="submit" class="btn btn-outline-primary">Upload</button>
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
        window.location.href = "../../../";
    }
</script>