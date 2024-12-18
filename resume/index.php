<?php
// GAWIN NIO NA GUSTO NIO D2
// BASTA FOR NOW, PUPUNTA TOH SA dashboard.php
session_start();
$_SESSION = [];

header("Location: dashboard.php");
exit;
?>