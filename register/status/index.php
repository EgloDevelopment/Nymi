<?php
error_reporting(0);
sleep(1);
session_start();
include('../../resources/header-no-secure.php');

echo '<div class="position-absolute top-50 start-50 translate-middle">';
echo '<div class="card" style="width: 20rem; height: 10rem;">';
echo '<div class="position-absolute top-50 start-50 translate-middle">';
echo '<p class="center">';
if ($_SESSION['register-action'] == 'email-exists') {
    echo 'An account already exists with that email.';
    echo '<br><p class="center"><a href="../../register">Back</a></p>';
} else {
    if ($_SESSION['register-action'] == 'db-error') {
        echo 'Error connecting.';
    } else {
        if ($_SESSION['register-action'] == 'success') {
            echo 'Account has been created.';
            echo '<br><p class="center"><a href="../../login">Login</a></p>';
        } else {
            if ($_SESSION['register-action'] == 'password-match') {
                echo 'Passwords do not match.';
                echo '<br><p class="center"><a href="../../register">Back</a></p>';
            } else {
                if ($_SESSION['register-action'] == 'password-length') {
                    echo 'Password is too short.';
                    echo '<br><p class="center"><a href="../../register">Back</a></p>';
                } else {
                    if ($_SESSION['register-action'] == 'empty') {
                        echo 'Please fill out all fields.';
                        echo '<br><p class="center"><a href="../../register">Back</a></p>';
                    } else {
                        echo 'Error. Please refresh the page.';
                    }
                }
            }
        }
    }
}
echo '</p>';
echo '</div>';
echo '</div>';
echo '</div>';
