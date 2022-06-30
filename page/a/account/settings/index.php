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
          <a class="nav-link" aria-current="page" href="../../../../page/a/account/data">Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../../../../page/a/account/settings">Settings</a>
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
  <h1 class="txt2">Settings</h1>
  <hr class="hr1">
  <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>


  <form action="../../../../page/a/account/settings/proc.php" method="POST" target="dummyframe">
    <h5 class="txt2">View</h5>
    <div class="form-check" id="btn3">
      <input class="form-check-input" type="radio" name="view" id="view1" value="option1" <?php if ($_SESSION['view-option'] == 'grid') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>
      <label class="form-check-label" for="view1">
        Grid
      </label>
    </div>
    <div class="form-check" id="btn4">
      <input class="form-check-input" type="radio" name="view" id="view2" value="option2" <?php if ($_SESSION['view-option'] == 'list') {
                                                                                                    echo 'checked';
                                                                                                  } ?>>
      <label class="form-check-label" for="view2">
        List
      </label>
    </div>
    <button class="btn btn-outline-primary" id="btn3" onclick="redir();" type="submit">Update</button>
  </form>
  <script>
    function redir() {
      window.location.href = "../../../../page/a/account/settings/status";
    }
  </script>