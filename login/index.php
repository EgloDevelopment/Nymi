<?php

session_start();
include('../resources/header-no-secure.php');
error_reporting(0);

if ($_SESSION['logged-in'] == 'true') {
    echo '<script>window.location.href = "../../";</script>';
} else {
    echo '';
}

if (!isset($_COOKIE['token'])) {
    echo '';
} else {
    if ($_COOKIE['token'] == 'logged-out') {
        echo '';
    } else {
        echo '<script>window.location.href = "../login/token";</script>';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color:#fbfbfb;">

    <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h1 class="center">Login</h1>
                <br>
                <form action="../login/proc.php" method="POST" target="dummyframe">
                    <input type="username" class="form-control" name="email" placeholder="Email">
                    <br>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <br>
                    <div class="center">
                        <button type="submit" class="btn btn-outline-primary" onclick="redir();">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function redir() {
            window.location.href = "../login/status";
        }
    </script>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>