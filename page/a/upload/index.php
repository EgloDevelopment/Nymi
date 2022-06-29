<?php

session_start();
include('../../../resources/header.php');
$to = $_GET['l'];
?>

<iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
<div class="position-absolute top-50 start-50 translate-middle">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h1 class="center">Upload</h1>
            <br>
            <form action="../../../page/a/upload/proc.php" method="POST" target="dummyframe" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="TO" value="<?php echo $to ?>">
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