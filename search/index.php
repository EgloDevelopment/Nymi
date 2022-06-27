<?php
session_start();
include('../resources/header.php');
$parent = $_SESSION['owner-id'];
$uploadto = $_SESSION['files-id'];
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../">Files</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../trash">Trash</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../search">Search</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Upload
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../page/a/upload/?l=<?php echo $uploadto ?>">Upload file</a></li>
                        <li><a class="dropdown-item" href="../page/a/upload/folder?l=<?php echo $uploadto ?>">Upload folder</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../page/a/upload/folder/new?l=<?php echo $uploadto ?>">New folder</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <a class="btn btn-outline-success" href="../page/a/account/settings">Settings</a>
            </form>
        </div>
    </div>
</nav>
<div class="position-absolute top-50 start-50 translate-middle">
    <form action="../search/find" method="POST">
        <input type="username" class="form-control" name="search" placeholder="Name">
        <br>
        <div class="center">
            <button type="submit" class="btn btn-outline-primary">Search</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>