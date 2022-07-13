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

    $fileid = getString(20);
    $trashid = getString(20);
    $ownerid = getString(20);

    $email = $_POST['email'];
    $escemail = clear("$email");

    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $escpassword = clear("$password1");

    $firstname = $_POST['firstname'];
    $escfirstname = clear("$firstname");

    $lastname = $_POST['lastname'];
    $esclastname = clear("$lastname");


    if (empty($email)) {
        $_SESSION['register-action'] = 'empty';
        return;
    } else {
        echo "";
    }

    if ($password1 == $password2) {
        echo '';
    } else {
        $_SESSION['register-action'] = 'password-match';
        return;
    }

    if (strlen($password1) >= '6') {
        echo '';
    } else {
        $_SESSION['register-action'] = 'password-length';
        return;
    }


    if (empty($firstname)) {
        $_SESSION['register-action'] = 'empty';
        return;
    } else {
        echo "";
    }

    if (empty($lastname)) {
        $_SESSION['register-action'] = 'empty';
        return;
    } else {
        echo "";
    }


    // Create connection
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT email FROM Users WHERE email = '$escemail'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['register-action'] = 'email-exists';
    } else {
        $sql = "INSERT INTO `users`(`email`, `password`, `firstname`, `lastname`, `date`, `token`, `filesid`, `trashid`, `ownerid`, `view`) VALUES ('$escemail','$escpassword','$escfirstname','$esclastname','first-login','first-login','$fileid', '$trashid', '$ownerid', '1')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['register-action'] = 'success';
        } else {
            $_SESSION['register-action'] = 'db-error';
        }
    }


    ?>