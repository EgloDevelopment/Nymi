<?php
session_start();
include('../../../resources/header.php');
$parent = $_SESSION['owner-id'];
$searchterm = $_GET['s'];
$uploadto = $_SESSION['files-id'];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link" aria-current="page" href="../../../">Files</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../../trash">Trash</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../../../search">Search</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Upload
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../../../page/a/upload/?l=<?php echo $parent ?>">Upload file</a></li>
            <li><a class="dropdown-item" href="../../../page/a/upload/folder?l=<?php echo $parent ?>">Upload folder</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="../../../page/a/upload/folder/new?l=<?php echo $parent ?>">New folder</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <a class="btn btn-outline-success" id="btn5" href="../../../search/find/grid?s=<?php echo $searchterm ?>">List</a>
        <a class="btn btn-outline-success" href="../../../page/a/account/settings">Settings</a>
      </form>
    </div>
  </div>
</nav>
<?php

require_once('../../../resources/DB/config.php');


$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Files WHERE name LIKE '%$searchterm%' AND owner = '$parent'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo '<h5 style="margin-top: 10px; margin-left: 18px;">Files:</h5>';
echo '<hr>';
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $name = $row['name'];
    $extension = $row['extension'];
    echo '<div class="list-items">';
    if ($extension == '.folder') {
      echo "
      <a href='../../../view/folder?i=$id&n=$name'>View</a>
      <a href='../../../page/a/share?i=$id&n=$name'>Share</a>
      <a href='../../../page/a/rename?i=$id&n=$name'>Rename</a>
      <a href='../../../page/a/move?i=$id&n=$name'>Move</a>
      <a href='../../../page/a/trash?i=$id&n=$name'>Trash</a>";
    } else {
      echo "
      <a href='../../../view/?i=$id'>View</a>
      <a href='../../../page/a/share?i=$id&n=$name'>Share</a>
      <a href='../../../page/a/rename?i=$id&n=$name'>Rename</a>
      <a href='../../../page/a/move?i=$id&n=$name'>Move</a>
      <a href='../../../page/a/trash?i=$id&n=$name'>Trash</a>
      <a href='../../../files/$id' download>Download</a>";
    }
    echo '</div>';
    echo "<p class='list-text'>$name$extension</p>";
    echo '<hr>';
    echo '</div>';
  }
} else {
  echo '<div class="position-absolute top-50 start-50 translate-middle">';
  echo '<p class="center">';
  echo "Huh, no files here, upload some?";
  echo '</p>';
}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>