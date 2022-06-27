<?php
session_start();
include('../resources/header-no-secure.php');



if ($_GET['a'] == 'rate') {
    echo 'You have reached the limit of requests you can send in 5 seconds';
    $_SESSION['rate-limiter'] = '0';
} else {
    if ($_GET['a'] == 'perm') {
        echo 'You do not have permission to be there';
    } else {
        if ($_GET['a'] == 'load-error') {
            echo 'Sorry, we had trouble loading this file';
        } else {
            if ($_GET['a'] == 'js') {
                echo 'Javascript is required to run this page';
            }
        }
    }
}
