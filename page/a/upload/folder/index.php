<?php
// Initialize session
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
    $parent = $_GET['l'];
    $folderdname = $_POST['NAME'];
    $owner = $_SESSION['owner-id'];
    $sql1 = "INSERT INTO `files`(`id`, `name`, `extension`, `parent`, `owner`, `sharing`) VALUES ('$string','$folderdname','.folder','$parent','$owner','1')";
    if ($conn->query($sql1) === TRUE) {
        //$_SESSION['upload-action'] = 'success';
    } else {
        echo '<script>window.location.href = "../../../page?a=error";</script>';
    }
    foreach ($_FILES['files']['name'] as $i => $name) {
        $temp = explode(".", $_FILES['files']['name'][$i]);
        $newname = getString(20) . '.' . end($temp);
        $sqlext = end($temp);
        if (strlen($_FILES['files']['name'][$i]) > 1) {

            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], '../../../../files/' . $newname)) {
                $sql2 = "INSERT INTO `files`(`id`, `name`, `extension`, `parent`, `owner`, `sharing`) VALUES ('$newname','$name','.$sqlext','$string','$owner','1')";


                if ($conn->query($sql2) === TRUE) {
                    echo '<script>window.location.href = "../../../../";</script>';
                } else {
                    echo '<script>window.location.href = "../../../../page?a=error";</script>';
                }
                $count++;
            }
        }
    }
}
?>

<body>
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 18rem; height: 21rem;">
            <div class="card-body">
                <h1 class="center">Upload</h1>
                <br>
                <form action="" method="POST" enctype="multipart/form-data" class="mx-auto">
                    <input class="form-control me-2" name="NAME" placeholder="Folder name"><br>
                    <div class="input-group">
                        <input type="file" name="files[]" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" multiple="" directory="" webkitdirectory="" mozdirectory="">
                    </div>
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
    </div>
    <script>
        function redir() {
            window.location.href = "../../../../";
        }
    </script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>