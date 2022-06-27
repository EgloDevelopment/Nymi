<?php
session_start();
include('../../../../resources/header.php');
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../../../../page/a/account/data">Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../../../../page/a/account/settings">Settings</a>
        </li>
      </ul>
      <form class="d-flex">
        <a class="btn btn-outline-danger" style="margin-right: 10px;" href="../../../../functions/logout.php">Logout</a>
        <a class="btn btn-outline-success" href="../../../../">Home</a>
      </form>
    </div>
  </div>
</nav>


<div>
  <h1 class="txt2">Settings</h1>
  <hr class="hr1">
  <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>


  <form action="../../../../page/a/account/settings/proc.php" method="POST" target="dummyframe">
    <h5 class="txt2">Dark-mode</h5>
    <div class="form-check" id="btn3">
      <input class="form-check-input" type="radio" name="dark" id="exampleRadios1" value="option1" <?php if ($_SESSION['dark-enabled'] == 'true') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>
      <label class="form-check-label" for="exampleRadios1">
        On
      </label>
    </div>
    <div class="form-check" id="btn4">
      <input class="form-check-input" type="radio" name="dark" id="exampleRadios2" value="option2" <?php if ($_SESSION['dark-enabled'] == 'false') {
                                                                                                      echo 'checked';
                                                                                                    } ?>>
      <label class="form-check-label" for="exampleRadios2">
        Off
      </label>
    </div>
    <h5 class="txt2">2FA</h5>
    <div class="form-check" id="btn3">
      <input class="form-check-input" type="radio" name="2fa" id="exampleRadios1" value="option1" <?php if ($_SESSION['2fa-enabled'] == 'true') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>
      <label class="form-check-label" for="exampleRadios1">
        On
      </label>
    </div>
    <div class="form-check" id="btn4">
      <input class="form-check-input" type="radio" name="2fa" id="exampleRadios2" value="option2" <?php if ($_SESSION['2fa-enabled'] == 'false') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>
      <label class="form-check-label" for="exampleRadios2">
        Off
      </label>
    </div>
    <button class="btn btn-outline-primary" id="btn3" onclick="redir();" type="submit">Update</button>
  </form>
  <script>
    function redir() {
      window.location.href = "../../../../page/a/account/settings/status";
    }
  </script>