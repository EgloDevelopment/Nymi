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
        <a class="btn btn-outline-success" id="btn5" href="../../../search/find/list?s=<?php echo $searchterm ?>">List</a>
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
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];
        $extension = $row['extension'];

        echo '<div class="card1">';
        echo "<div class='card' id='file-card' style='width: 15rem; height: 19rem;'>";
        if ($extension == '.png') {
            echo "<img src='../../../files/$id' class='card-img-top' id='card2' alt='File preview'>";
        } else {
            if ($extension == '.jpg') {
                echo "<img src='../../../files/$id' class='card-img-top' id='card2' alt='File preview'>";
            } else {
                if ($extension == '.gif') {
                    echo "<img src='../../../files/$id' class='card-img-top' id='card2' alt='File preview'>";
                } else {
                    if ($extension == '.svg') {
                        echo "<img src='../../../files/$id' class='card-img-top' id='card2' alt='File preview'>";
                    } else {
                        if ($extension == '.exe') {
                            echo "<img src='../../../resources/images/icons/exe.svg' class='card-img-top' id='card2' alt='File preview'>";
                        } else {
                            if ($extension == '.folder') {
                                echo "<img src='../../../resources/images/icons/folder.svg' class='card-img-top' id='card2' alt='File preview'>";
                            } else {
                                if ($extension == '.html') {
                                    echo "<img src='../../../resources/images/icons/html.svg' class='card-img-top' id='card2' alt='File preview'>";
                                } else {
                                    if ($extension == '.js') {
                                        echo "<img src='../../../resources/images/icons/js.svg' class='card-img-top' id='card2' alt='File preview'>";
                                    } else {
                                        if ($extension == '.mp3') {
                                            echo "<img src='../../../resources/images/icons/mp3.svg' class='card-img-top' id='card2' alt='File preview'>";
                                        } else {
                                            if ($extension == '.mp4') {
                                                echo "<img src='../../../resources/images/icons/mp4.svg' class='card-img-top' id='card2' alt='File preview'>";
                                            } else {
                                                if ($extension == '.php') {
                                                    echo "<img src='../../../resources/images/icons/php.svg' class='card-img-top' id='card2' alt='File preview'>";
                                                } else {
                                                    if ($extension == '.wav') {
                                                        echo "<img src='../../../resources/images/icons/wav.svg' class='card-img-top' id='card2' alt='File preview'>";
                                                    } else {
                                                        if ($extension == '.zip') {
                                                            echo "<img src='../../../resources/images/icons/zip.svg' class='card-img-top' id='card2' alt='File preview'>";
                                                        } else {
                                                            echo "<img src='../../../resources/images/icons/file.svg' class='card-img-top' id='card2' alt='File preview'>";
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        echo "<div class='card-body'>";
        //echo "<h5 class='card-title'>$name</h5>";
        echo "<div class='dropdown' style='margin-top: 30px;'>
    <button class='btn btn-primary btn-sm dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
      $name
    </button>
    <ul class='dropdown-menu dropdown-menu-dark' aria-labelledby='dropdownMenuButton1'>";
        if ($extension == '.folder') {
            echo "
      <li><a class='dropdown-item' href='../../../view/folder?i=$id&n=$name'>View</a></li>
      <li><a class='dropdown-item' href='../../../page/a/share?i=$id&n=$name'>Share</a></li>
      <li><a class='dropdown-item' href='../../../page/a/rename?i=$id&n=$name'>Rename</a></li>
      <li><a class='dropdown-item' href='../../../page/a/move?i=$id&n=$name'>Move</a></li>
      <li><a class='dropdown-item' href='../../../page/a/trash?i=$id&n=$name'>Trash</a></li>";
        } else {
            echo "
      <li><a class='dropdown-item' href='../../../view/?i=$id'>View</a></li>
      <li><a class='dropdown-item' href='../../../page/a/share?i=$id&n=$name'>Share</a></li>
      <li><a class='dropdown-item' href='../../../page/a/rename?i=$id&n=$name'>Rename</a></li>
      <li><a class='dropdown-item' href='../../../page/a/move?i=$id&n=$name'>Move</a></li>
      <li><a class='dropdown-item' href='../../../page/a/trash?i=$id&n=$name'>Trash</a></li>
      <li><a class='dropdown-item' href='../../../files/$id' download>Download</a></li>
    </ul>
  </div>";
        }
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo '<div class="position-absolute top-50 start-50 translate-middle">';
    echo '<p class="center">';
    echo "Weird, we couldnt find that file.";
    echo '</p>';
    echo '</div>';
}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>