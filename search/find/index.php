<?php
error_reporting(0);
session_start();
include('resources/header.php');
$s = $_POST['search'];
if ($_SESSION['view'] == '1') {
  echo "<script>window.location.href = '../../search/find/grid?s=$s';</script>";
} else {
  echo "<script>window.location.href = '../../search/find/list?s=$s';</script>";
}
?>