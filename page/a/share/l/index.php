<?php

session_start();
include('../../../../resources/header.php');
$id = $_GET['i'];
$name = $_GET['n'];
$url = $_SESSION['url'] . "/view/share?i=$id";
?>

<iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
<div class="position-absolute top-50 start-50 translate-middle">
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <p>File link: <a href="<?php echo $url ?>"><?php echo $name ?></a></p>
      <div class="center">
        <br>
        <button class="btn btn-outline-primary" onclick="copy(), redir();">Copy</button>
        <br>
        <br>
        <button class="btn btn-outline-secondary" onclick="redir();">Home</button>
      </div>
    </div>
  </div>
</div>

<script>
  function redir() {
    window.location.href = "../../../../";
  }

  function copy() {
    var text = "<?php echo $url ?>";
    navigator.clipboard.writeText(text).then(function() {
      console.log('Async: Copying to clipboard was successful!');
    }, function(err) {
      console.error('Async: Could not copy text: ', err);
    });
  }
</script>