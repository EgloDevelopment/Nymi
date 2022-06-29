<?php
session_start();
include('../../../../../resources/header.php');
echo '<div class="position-absolute top-50 start-50 translate-middle">';
echo '<div class="card" style="width: 20rem; height: 10rem;">';
echo '<div class="position-absolute top-50 start-50 translate-middle">';
echo '<p class="center">';
echo 'Success.';
$_SESSION['logout-req'] = 'true';
echo '<br><p class="center"><a href="../../../../../functions/logout.php">Login</a></p>';
echo '</p>';
echo '</div>';
echo '</div>';
echo '</div>';
