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
            <h1 class="center">Share</h1>
            <br>
            <p class="center">Filename: <?php echo $current ?></p>
            <form action="../../../page/a/share/proc.php" method="POST" target="dummyframe">
                <input type="hidden" class="form-control" name="ID" value="<?php echo $id ?>">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Who can view</label>
                    <select class="form-select" name="pref" id="inputGroupSelect01">
                        <option value="1">Only me</option>
                        <option value="2">Anyone</option>
                    </select>
                </div>
                <br>
                <div class="center">
                    <button type="submit" class="btn btn-outline-primary" onclick="redir();">Share</button>
                </div>
            </form>
            <div class="center">
                <br>
                <button class="btn btn-outline-secondary" onclick="redir1();">Back</button>
            </div>
        </div>
    </div>
</div>

<script>
    function redir() {
        window.location.href = "../../../page/a/share/l?i=<?php echo $id ?>&n=<?php echo $current ?>";
    }

    function redir1() {
        window.location.href = "../../../";
    }
</script>