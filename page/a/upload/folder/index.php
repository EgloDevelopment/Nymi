<?php
// Initialize session
session_start();
include('../../../../resources/header.php');
$to = $_GET['l'];
?>

<body>
    <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 18rem; height: 21rem;">
            <div class="card-body">
                <h1 class="center">Upload</h1>
                <br>
                <form action="../../../../page/a/upload/folder/proc.php" method="post" target="dummyframe" enctype="multipart/form-data" class="mx-auto">
                    <input class="form-control me-2" name="NAME" placeholder="Folder name"><br>
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="TO" value="<?php echo $to ?>">
                        <input type="file" name="files[]" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" multiple="" directory="" webkitdirectory="" mozdirectory="">
                    </div>
                    <br>
                    <div class="center">
                        <button type="submit" class="btn btn-outline-primary" onclick="redir();">Upload</button>
                    </div>
                </form>
                <div class="center">
                    <br>
                    <button class="btn btn-outline-secondary" onclick="redir();">Back</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function redir() {
            window.location.href = "../../../../";
        }
    </script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>