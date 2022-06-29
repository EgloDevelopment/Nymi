<?php
session_start();
include('../../../../resources/header.php');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../../../../page/a/account/data">Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../../../../page/a/account/settings">Settings</a>
        </li>
      </ul>
      <form class="d-flex">
        <a class="btn btn-outline-danger" id="btn5" href="../../../../functions/logout.php">Logout</a>
        <a class="btn btn-outline-success" href="../../../../">Home</a>
      </form>
    </div>
  </div>
</nav>


<div>
  <h1 class="txt2">Data</h1>
  <hr class="hr1">
  <p class="txt3">User ID: <?php echo $_SESSION['id'] ?></p>
  <p class="txt3">Name: <?php echo $_SESSION['first-name'] . ' ' . $_SESSION['last-name'] ?> </p>
  <p class="txt3">Email: <?php echo $_SESSION['email'] ?></p>
  <p class="txt3">2FA enabled: <?php echo $_SESSION['2fa-enabled'] ?></p>
  <hr class="hr1">
  <p class="txt3">Account created: <?php echo $_SESSION['account-created'] ?></p>
  <p class="txt3">Last login: <?php echo $_SESSION['last-login'] ?></p>
  <hr class="hr1">
  <p class="txt3">Files ID: <?php echo $_SESSION['files-id'] ?></p>
  <p class="txt3">Trash ID: <?php echo $_SESSION['trash-id'] ?></p>
  <p class="txt3">Owner ID: <?php echo $_SESSION['owner-id'] ?></p>