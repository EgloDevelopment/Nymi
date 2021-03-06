<?php
session_start();
include('../resources/header.php');

require_once('../resources/DB/config.php');

$id = $_GET['i'];

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM files WHERE id ='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $owner = $row['owner'];
        if ($owner == $_SESSION['owner-id']) {
            echo '';
        } else {
            echo '<script>window.location.href = "../page?a=perm";</script>';
        }
        $extension = $row['extension'];
        $date = $row['date'];
        $parent = $row['parent'];
        $id = $row['id'];
        $name = $row['name'];
        echo "<div class='center'><iframe src='../files/$id' title='File Viewer' class='viewer' sandbox></iframe><p>$name$extension</p><br><p>$date</p></div>";
    }
} else {
    echo '<script> window.location.href = "../page?a=load-error";</script>';
}


//echo getString(30) . '<br>';
?>
<div class="position-absolute top-0 start-0">
    <a href="../">
        <img src="../resources/images/viewer/back.svg" class="img1">
    </a>
</div>

<div class="position-absolute top-0 end-0" style="margin-right: 30px">
    <a href="../page/a/rename?i=<?php echo $id ?>&n=<?php echo $name ?>">
        <img src="../resources/images/viewer/rename.svg" class="img1">
    </a>
</div>

<div class="position-absolute top-0 end-0" style="margin-right: 90px">
    <a href="../page/a/share?i=<?php echo $id ?>&n=<?php echo $name ?>">
        <img src="../resources/images/viewer/share.svg" class="img1">
    </a>
</div>

<div class="position-absolute top-0 end-0" style="margin-right: 150px">
    <a href="../page/a/move?i=<?php echo $id ?>&n=<?php echo $name ?>">
        <img src="../resources/images/viewer/move.svg" class="img1">
    </a>
</div>

<div class="position-absolute top-0 end-0" style="margin-right: 210px">
    <a href="../page/a/trash?i=<?php echo $id ?>&n=<?php echo $name ?>">
        <img src="../resources/images/viewer/delete.svg" class="img1">
    </a>
</div>

<div class="position-absolute top-0 end-0" style="margin-right: 260px">
    <a href='../files/<?php echo $id ?>' download>
        <img src="../resources/images/viewer/download.svg" class="img1">
    </a>
</div>