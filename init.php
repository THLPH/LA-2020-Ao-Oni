<?php
session_start();

// AUTHENTICATION GUARD
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// GLOBAL VARIABLE SHORTCUTS
$user =  $_SESSION['username'];
$emp  = &$_SESSION['empathy']    ?? 0;
$end  = &$_SESSION['ending']     ?? 1;
$day  = &$_SESSION['day']        ?? 1;
$cred = &$_SESSION['credits']    ?? 0;
$wep  = &$_SESSION['weapon']     ?? 0;
$cyb  = &$_SESSION['cybernetic'] ?? 0;
$sec  = &$_SESSION['manga']      ?? false;
?>
