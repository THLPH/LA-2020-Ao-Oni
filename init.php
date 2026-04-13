<?php
session_start();

// AUTHENTICATION GUARD

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// INITIALIZE SESSION DEFAULTS

$_SESSION['empathy']    ??= 0;
$_SESSION['ending']     ??= 1;
$_SESSION['day']        ??= 1;
$_SESSION['credits']    ??= 0;
$_SESSION['weapon']     ??= 0;
$_SESSION['cybernetic'] ??= 0;
$_SESSION['manga']      ??= false;
$_SESSION['class']      ??= 'UNASSIGNED';
$_SESSION['attack']        ??= 0;
$_SESSION['defense']        ??= 0;

// GLOBAL VARIABLE SHORTCUTS

$user  = $_SESSION['username'];
$emp   = &$_SESSION['empathy'];
$end   = &$_SESSION['ending'];
$day   = &$_SESSION['day'];
$cred  = &$_SESSION['credits'];
$wep   = &$_SESSION['weapon'];
$cyb   = &$_SESSION['cybernetic'];
$sec   = &$_SESSION['manga'];
$class = &$_SESSION['class'];
$atk   = &$_SESSION['attack'];
$def   = &$_SESSION['defense'];
?>
