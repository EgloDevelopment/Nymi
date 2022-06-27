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
            <h1 class="center">Rename</h1>
            <br>
            <!--p class="center">Current name: <?php //echo $current 
                                                ?></p-->
            <form action="../../../page/a/rename/proc.php" method="POST" target="dummyframe">
                <input type="username" class="form-control" name="newname" placeholder="<?php echo $current ?>">
                <br>
                <input type="hidden" class="form-control" name="ID" value="<?php echo $id ?>">
                <br>
                <div class="center">
                    <button type="submit" class="btn btn-outline-primary" onclick="redir();">Rename</button>
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