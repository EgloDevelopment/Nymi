<?php
$cookietoken = $_COOKIE['token'];
session_start();
include('../../resources/header-no-secure.php');
//error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color:#fbfbfb;">

    <?php

    require_once('../../resources/DB/config.php');

    // Create connection
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE token = '$cookietoken'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $dbpassword = 'Password';
            $_SESSION['id'] = $row["id"];
            $id = $_SESSION['id'];
            $_SESSION['email'] = $row["email"];
            $_SESSION['first-name'] = $row["firstname"];
            $_SESSION['last-name'] = $row["lastname"];
            $_SESSION['files-id'] = $row["filesid"];
            $_SESSION['trash-id'] = $row["trashid"];
            $_SESSION['owner-id'] = $row["ownerid"];
            $_SESSION['last-login'] = $row["date"];
            $_SESSION['account-created'] = $row["created"];
            $_SESSION['2fa'] = $row["2fa"];
            $_SESSION['view'] = $row["view"];
        }

        $sql = "SELECT * FROM settings";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['rate-limit'] = $row["ratelimit"];
                $_SESSION['url'] = $row["url"];
            }

            $token = getString(20);
            $timezone  = -7; // Set to Colorado time
            $date = gmdate("Y/m/j H:i:s", time() + 3600 * ($timezone + date("I")));
            $tokensql = "UPDATE users SET token = '$token', date = '$date' WHERE id = $id";
            $conn->query($tokensql);
            setcookie('token', $token, time() + (86400 * 30), "/"); // 86400 = 1 day
            $_SESSION['auth-token'] = $token;
            $_SESSION['login-action'] = 'success';
            $_SESSION['rate-limiter'] = '0';
            $_SESSION['logout-req'] = 'false';



            if ($_SESSION['2fa'] === '1') {
                $_SESSION['2fa-enabled'] = 'false';
            } else {
                $_SESSION['2fa-enabled'] = 'true';
            }


            if ($_SESSION['view'] === '1') {
                $_SESSION['view-option'] = 'grid';
            } else {
                $_SESSION['view-option'] = 'list';
            }


            $_SESSION['logged-in'] = 'true';
            echo '<script>window.location.href = "../../";</script>';
        } else {
            echo '<script>window.location.href = "../../login/status";</script>';
            $_SESSION['login-action'] = 'db-error';
        }
    } else {
        echo '<script>window.location.href = "../../login/status";</script>';
        $_SESSION['login-action'] = 'wrong-creds';
    }





    $conn->close();

    ?>

    <head>
        <title>Cloud - Eglo.pw</title>
    </head>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>