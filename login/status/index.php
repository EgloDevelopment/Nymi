<?php
error_reporting(0);
sleep(2);
session_start();
include('../../resources/header-no-secure.php');

echo '<div class="position-absolute top-50 start-50 translate-middle">';
echo '<div class="card" style="width: 20rem; height: 10rem;">';
echo '<div class="position-absolute top-50 start-50 translate-middle">';
echo '<p class="center">';
if ($_SESSION['login-action'] == 'db-error') {
    echo 'Error connecting.';
    echo '<br><p class="center"><a href="../../login">Back</a></p>';
} else {
    if ($_SESSION['login-action'] == 'success') {
        echo 'Login success.';
        echo '<br><p class="center"><a href="../../../">Home</a></p>';
    } else {
        if ($_SESSION['login-action'] == 'wrong-creds') {
            echo 'Wrong email/password combo.';
            echo '<br><p class="center"><a href="../../login">Back</a></p>';
        } else {
            echo 'Please refresh the page.';
        }
    }
}
echo '</p>';
echo '</div>';
echo '</div>';
echo '</div>';
