<?php

session_start();
include('../../../resources/header.php');
$fileid = $_GET['i'];
$homeid = $_SESSION['files-id'];
$current = $_GET['n'];
?>

<iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
<div class="position-absolute top-50 start-50 translate-middle">
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h1 class="center">Move</h1>
      <br>
      <?php
      require_once('../../../resources/DB/config.php');

      $owner = $_SESSION['owner-id'];

      $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM Files WHERE NOT id ='$fileid'  AND owner ='$owner' AND extension ='.folder'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {

        echo "<p class='center'>Move $current to:</p>";
        echo "<hr>";
        echo "<form action='../../../page/a/move/proc.php' method='POST' target='dummyframe'>";
        echo "Home";
        echo "<input type='hidden' name='File' value='$fileid'>";
        echo "<input type='hidden' name='ID' value='$homeid'>";
        echo "<a href='javascript:;' class='link2' onclick='parentNode.submit(), redir();'>Move</a>";
        echo "</form>";
        echo "<hr>";
        while ($row = $result->fetch_assoc()) {
          $id = $row['id'];
          $name = $row['name'];
          echo "<form action='../../../page/a/move/proc.php' method='POST' target='dummyframe'>";
          echo "$name";
          echo "<input type='hidden' name='File' value='$fileid'>";
          echo "<input type='hidden' name='ID' value='$id'>";
          echo "<a href='javascript:;' class='link2' onclick='parentNode.submit(), redir();'>Move</a>";
          echo "</form>";
          echo "<hr>";
        }
      } else {
        echo "<br>";
        echo "<br>";
        echo '<div class="position-absolute top-50 start-50 translate-middle">';
        echo '<p class="center" >';
        echo "You have no folders.";
        echo '</p>';
        echo '</div>';
      }
      ?>
      </form>
      <div class="center">
        <br>
        <button class="btn btn-outline-secondary" onclick="redir();">Back</button>
      </div>
    </div>
  </div>
</div>

<script>
  function redir() {
    window.location.href = "../../../";
  }
</script>