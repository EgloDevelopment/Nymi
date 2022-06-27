<?php

session_start();
include('../../../resources/header.php');
$id = $_GET['i'];
$current = $_GET['n'];
?>

<iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
<div class="position-absolute top-50 start-50 translate-middle">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h1 class="center">Trash</h1>
            <br>
            <p class="center">Are you sure you want <br> to delete <?php echo $current ?>?</p>
            <form action="../../../page/a/delete/proc.php" method="POST" target="dummyframe">
                <input type="hidden" class="form-control" name="ID" value="<?php echo $id ?>">
                <br>
                <div class="center">
                    <button type="submit" class="btn btn-outline-danger" onclick="redir();">Delete</button>
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
        window.location.href = "../../../trash";
    }
</script>