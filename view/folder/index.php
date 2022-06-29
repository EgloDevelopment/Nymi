<?php
error_reporting(0);
session_start();
include('../../../resources/header.php');
$foldname = $_GET['n'];
$parent = $_GET['i'];

if ($_SESSION['view'] == '1') {
  echo "<script>window.location.href = '../../../view/folder/grid?i=$parent&n=$foldname';</script>";
} else {
  echo "<script>window.location.href = '../../../view/folder/list?i=$parent&n=$foldname';</script>";
}
?>