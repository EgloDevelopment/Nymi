<?php
error_reporting(0);
session_start();
include('../../resources/header.php');
$parent = $_SESSION['trash-id'];
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link" aria-current="page" href="../../">Files</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../../trash">Trash</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../search">Search</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Upload
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../../page/a/upload/?l=<?php echo $parent ?>">Upload file</a></li>
            <li><a class="dropdown-item" href="../../page/a/upload/folder?l=<?php echo $parent ?>">Upload folder</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="../../page/a/upload/folder/new?l=<?php echo $parent ?>">New folder</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <a class="btn btn-outline-success" id="btn5" href="../../trash/grid">Grid</a>
        <a class="btn btn-outline-success" href="../../page/a/account/settings">Settings</a>
      </form>
    </div>
  </div>
</nav>
<?php

require_once('../../resources/DB/config.php');


$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Files WHERE parent ='$parent'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo '<h5 style="margin-top: 10px; margin-left: 18px;">Files:</h5>';
echo '<hr>';
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $name = $row['name'];
    $extension = $row['extension'];
    echo '<div class="list-items">';
    echo "
      <li><a class='dropdown-item' href='../../page/a/delete?i=$id&n=$name'>Delete</a></li>
      <li><a class='dropdown-item' href='../../page/a/restore?i=$id&n=$name'>Restore</a></li>";
    echo '</div>';
    echo "<p class='list-text'>$name</p>";
    echo '<hr>';
    echo '</div>';
  }
} else {
  echo '<div class="position-absolute top-50 start-50 translate-middle">';
  echo '<p class="center">';
  echo "Huh, no files here, delete some?";
  echo '</p>';
}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>