<?php
session_start();
session_destroy();
echo "<center><h1 align='center' style='color:#d71c1c'>Anda Telah Logout</h1></center>";
echo "<meta http-equiv='refresh' content='2;url=login.php'>";
?>
