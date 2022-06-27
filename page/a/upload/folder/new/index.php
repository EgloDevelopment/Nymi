<?php
session_start();
include('../../../../../resources/header.php');
$to = $_GET['l'];
?>

<iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
<div class="position-absolute top-50 start-50 translate-middle">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h1 class="center">Folder</h1>
            <br>
            <!--p class="center">Current name: <?php //echo $current 
                                                ?></p-->
            <form action="../../../../../page/a/upload/folder/new/proc.php" method="POST" target="dummyframe" enctype="multipart/form-data">
                <input type="username" class="form-control" name="name" placeholder="Name">
                <input type="hidden" class="form-control" name="TO" value="<?php echo $to ?>">
                <br>
                <div class="center">
                    <button type="submit" class="btn btn-outline-primary" onclick="redir();">Create</button>
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