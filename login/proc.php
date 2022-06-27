<?php

session_start();
include('../resources/header-no-secure.php');
//error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color:#fbfbfb;">

    <?php

    require_once('../resources/DB/config.php');

    $email = $_POST['email'];
    $escemail = clear("$email");

    $password = $_POST['password'];
    $escpassword = clear("$password");


    // Create connection
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT id, email, password FROM Users WHERE email = '$escemail'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $dbemail = $row["email"];
            $dbpassword = $row["password"];
        }
    } else {
        $_SESSION['login-action'] = 'wrong-creds';
    }

    if ($dbemail == $escemail) {
        if ($dbpassword == $escpassword) {
            $sql = "SELECT * FROM Users WHERE id = '$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $dbpassword = 'Password';
                    $_SESSION['id'] = $row["id"];
                    $_SESSION['email'] = $row["email"];
                    $_SESSION['first-name'] = $row["firstname"];
                    $_SESSION['last-name'] = $row["lastname"];
                    $_SESSION['files-id'] = $row["filesid"];
                    $_SESSION['trash-id'] = $row["trashid"];
                    $_SESSION['owner-id'] = $row["ownerid"];
                    $_SESSION['last-login'] = $row["date"];
                    $_SESSION['account-created'] = $row["created"];
                    $_SESSION['2fa'] = $row["2fa"];
                    $_SESSION['dark-mode'] = $row["dark"];
                }

                $sql = "SELECT * FROM Settings";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $_SESSION['rate-limit'] = $row["ratelimit"];
                        $_SESSION['url'] = $row["url"];
                    }

                    $token = getString(20);
                    $timezone  = -7; // Set to Colorado time
                    $date = gmdate("Y/m/j H:i:s", time() + 3600 * ($timezone + date("I")));
                    $tokensql = "UPDATE Users SET token = '$token', date = '$date' WHERE id = $id";
                    $conn->query($tokensql);
                    $_SESSION['auth-token'] = $token;
                    $_SESSION['login-action'] = 'success';
                    $_SESSION['rate-limiter'] = '0';
                    $_SESSION['logout-req'] = 'false';
                    if ($_SESSION['2fa'] === '1') {
                        $_SESSION['2fa-enabled'] = 'false';
                    } else {
                        $_SESSION['2fa-enabled'] = 'true';
                    }
                    if ($_SESSION['dark-mode'] === '1') {
                        $_SESSION['dark-enabled'] = 'false';
                    } else {
                        $_SESSION['dark-enabled'] = 'true';
                    }
                    $_SESSION['logged-in'] = 'true';
                } else {
                    $_SESSION['login-action'] = 'db-error';
                }
            } else {
                $_SESSION['login-action'] = 'wrong-creds';
            }
        } else {
            $_SESSION['login-action'] = 'wrong-creds';
        }
    }




    $conn->close();

    ?>

    <head>
        <title>Cloud - Eglo.pw</title>
    </head>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>