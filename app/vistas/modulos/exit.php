<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
session_unset();
session_destroy();
?>

<!-- Redirección segura usando JavaScript -->
<script>
    window.location.href = "index.php";
</script>