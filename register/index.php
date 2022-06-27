<?php

session_start();
include('../resources/header-no-secure.php');
error_reporting(0);

if ($_SESSION['logged-in'] == 'true') {
    echo '<script>window.location.href = "../";</script>';
} else {
    echo '';
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
                <h1 class="center">Register</h1>
                <br>
                <form action="../register/proc.php" method="POST" target="dummyframe">
                    <input type="username" class="form-control" name="email" placeholder="Email">
                    <br>
                    <input type="password" class="form-control" name="password1" placeholder="Password">
                    <br>
                    <input type="password" class="form-control" name="password2" placeholder="Confirm password">
                    <br>
                    <input type="name" class="form-control" name="firstname" placeholder="First name">
                    <br>
                    <input type="name" class="form-control" name="lastname" placeholder="Last name">
                    <br>
                    <div class="center">
                        <button type="submit" class="btn btn-outline-primary" onclick="redir();">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function redir() {
            window.location.href = "../register/status";
        }
    </script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>