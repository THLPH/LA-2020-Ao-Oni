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
$_SESSION['attack']     ??= 0;
$_SESSION['defense']    ??= 0;

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

// Check if 'debug' is in the URL (e.g., game.php?debug=1)
// Or use a secret password (e.g., game.php?debug=opensesame)
if (isset($_GET['debug']) && $_GET['debug'] === '1') {
    $_SESSION['debug_view'] = true;
} 

// Allow a way to turn it off (e.g., game.php?debug=0)
if (isset($_GET['debug']) && $_GET['debug'] === '0') {
    $_SESSION['debug_view'] = false;
}

$DEBUG_MODE = $_SESSION['debug_view'] ?? false;
if ($DEBUG_MODE) {
    echo '
    <div id="php-debug-console" style="position:fixed; top:10px; right:10px; background:rgba(20,20,20,0.9); 
          color:#39ff14; padding:15px; border-radius:8px; font-family:monospace; z-index:9999; 
          width:250px; border:1px solid #39ff14; box-shadow: 0 0 10px #39ff14; font-size:12px;">
        <div style="display:flex; justify-content:space-between; border-bottom:1px solid #39ff14; margin-bottom:10px;">
            <strong>SYS_MONITOR</strong>
            <span onclick="this.parentElement.parentElement.style.display=\'none\'" style="cursor:pointer;">[X]</span>
        </div>
        <pre style="margin:0; white-space:pre-wrap;">' . print_r($_SESSION, true) . '</pre>
    </div>';
}
?>
