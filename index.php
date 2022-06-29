<?php
error_reporting(0);
session_start();
include('resources/header.php');
if ($_SESSION['view'] == '1') {
  echo '<script>window.location.href = "view/grid";</script>';
} else {
  echo '<script>window.location.href = "view/list";</script>';
}
?>