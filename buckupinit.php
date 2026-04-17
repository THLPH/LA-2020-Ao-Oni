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

// --- DEBUG & CHEAT SYSTEM ---
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

// 1. Handle the button clicks using your shortcuts
if ($DEBUG_MODE && isset($_POST['cheat_add_money'])) {
    $cred += 10000;
}
if ($DEBUG_MODE && isset($_POST['cheat_add_stat'])) {
    $atk += 100;
    $def += 100;
}

// NEW: Handle forcing a specific ending
if ($DEBUG_MODE && isset($_POST['cheat_force_ending'])) {
    $forced_ending = (int)$_POST['ending_id'];
    if ($forced_ending >= 1 && $forced_ending <= 5) {
        $end = $forced_ending; // Update the session via the reference variable
        header("Location: ending.php");
        exit();
    }
}

// 2. Render the System Monitor
if ($DEBUG_MODE) {
    echo '
    <div id="php-debug-console" style="position:fixed; top:10px; right:10px; background:rgba(20,20,20,0.9); 
          color:#39ff14; padding:15px; border-radius:8px; font-family:monospace; z-index:9999; 
          width:250px; border:1px solid #39ff14; box-shadow: 0 0 10px #39ff14; font-size:12px;">
        
        <div style="display:flex; justify-content:space-between; border-bottom:1px solid #39ff14; margin-bottom:10px;">
            <strong>SYS_MONITOR</strong>
            <span onclick="this.parentElement.parentElement.style.display=\'none\'" style="cursor:pointer;">[X]</span>
        </div>

        <pre style="margin:0; white-space:pre-wrap; max-height: 200px; overflow-y: auto;">' . print_r($_SESSION, true) . '</pre>

        <form method="POST" style="margin-top:15px; border-top:1px dashed #39ff14; padding-top:10px;">
            <button type="submit" name="cheat_add_money" style="width:100%; background:transparent; color:#39ff14; border:1px solid #39ff14; cursor:pointer; font-family:monospace; padding:5px; font-size:10px; font-weight:bold;">
                [ +10000 CREDITS ]
            </button>
            <button type="submit" name="cheat_add_stat" style="width:100%; background:transparent; color:#39ff14; border:1px solid #39ff14; cursor:pointer; font-family:monospace; padding:5px; font-size:10px; font-weight:bold; margin-top: 10px;">
                [ +100 ATK & DEF ]
            </button>
            
            <div style="display: flex; gap: 5px; margin-top: 10px;">
                <input type="number" name="ending_id" value="1" min="1" max="5" style="width: 40px; background: rgba(0,0,0,0.5); color: #39ff14; border: 1px solid #39ff14; font-family: monospace; text-align: center;">
                <button type="submit" name="cheat_force_ending" style="flex-grow: 1; background: transparent; color: #39ff14; border: 1px solid #39ff14; cursor: pointer; font-family: monospace; padding: 5px; font-size: 10px; font-weight: bold;">
                    [ JUMP TO ENDING ]
                </button>
            </div>
        </form>
    </div>';
}
?>