<?php
setcookie('token', 'logged-out', time() + (86400 * 30), "/");
session_start();
session_destroy();
echo '<script>window.location.href = "../login";</script>';
