<?php
session_start();
ob_start();
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
// Toggle via URL: game.php?debug=1 or game.php?debug=0
if (isset($_GET['debug']) && $_GET['debug'] === '1') {
    $_SESSION['debug_view'] = true;
} 
if (isset($_GET['debug']) && $_GET['debug'] === '0') {
    $_SESSION['debug_view'] = false;
}

$DEBUG_MODE = $_SESSION['debug_view'] ?? false;

// 1. Handle the button clicks
if ($DEBUG_MODE) {
    if (isset($_POST['cheat_add_money'])) { $cred += 10000; }
    
    // Stat Manipulation
    if (isset($_POST['cheat_add_stat']))  { $atk += 100; $def += 100; }
    if (isset($_POST['cheat_sub_stat']))  { $atk -= 100; $def -= 100; }
    
    // Day Manipulation (preventing negative days just in case)
    if (isset($_POST['cheat_add_day']))   { $day += 5; }
    if (isset($_POST['cheat_sub_day']))   { $day = max(1, $day - 1); }
    
    // Empathy Manipulation
    if (isset($_POST['cheat_add_emp']))   { $emp += 10; }
    if (isset($_POST['cheat_sub_emp']))   { $emp -= 10; }

    // Ending Selector
    if (isset($_POST['cheat_force_ending'])) {
        $forced_ending = (int)$_POST['ending_id'];
        if ($forced_ending >= 1 && $forced_ending <= 5) {
            $end = $forced_ending; 
            header("Location: ending.php");
            exit();
        }
    }
}

// 2. Render the System Monitor
if ($DEBUG_MODE) {
    echo '
    <div id="php-debug-console" style="position:fixed; top:15px; right:15px; background:#ffffff; 
          color:#334155; padding:16px; border-radius:12px; font-family:system-ui, -apple-system, sans-serif; 
          z-index:9999; width:300px; border:1px solid #e2e8f0; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); 
          font-size:13px;">
        
        <div style="display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid #e2e8f0; padding-bottom:10px; margin-bottom:12px;">
            <strong style="color:#0f172a; font-size:14px;">🛠 Debug Menu</strong>
            <span onclick="this.parentElement.parentElement.style.display=\'none\'" style="cursor:pointer; color:#94a3b8; font-weight:bold; padding:0 5px;">✕</span>
        </div>

        <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:6px; padding:8px; margin-bottom:16px;">
            <pre style="margin:0; white-space:pre-wrap; max-height:150px; overflow-y:auto; font-family:monospace; font-size:11px; color:#475569;">' . htmlspecialchars(print_r($_SESSION, true)) . '</pre>
        </div>

        <form method="POST" style="display:flex; flex-direction:column; gap:8px;">
            
            <button type="submit" name="cheat_add_money" style="width:100%; background:#f1f5f9; color:#334155; border:1px solid #cbd5e1; border-radius:6px; cursor:pointer; padding:8px; font-weight:600; transition:0.2s;">
                 +10,000 Credits
            </button>

            <div style="display:flex; gap:8px;">
                <button type="submit" name="cheat_sub_day" style="flex:1; background:#f1f5f9; color:#334155; border:1px solid #cbd5e1; border-radius:6px; cursor:pointer; padding:8px; font-weight:600;">
                    -1 Day
                </button>
                <button type="submit" name="cheat_add_day" style="flex:1; background:#f1f5f9; color:#334155; border:1px solid #cbd5e1; border-radius:6px; cursor:pointer; padding:8px; font-weight:600;">
                    +5 Days
                </button>
            </div>

            <div style="display:flex; gap:8px;">
                <button type="submit" name="cheat_sub_emp" style="flex:1; background:#f1f5f9; color:#334155; border:1px solid #cbd5e1; border-radius:6px; cursor:pointer; padding:8px; font-weight:600;">
                    -10 Emp
                </button>
                <button type="submit" name="cheat_add_emp" style="flex:1; background:#f1f5f9; color:#334155; border:1px solid #cbd5e1; border-radius:6px; cursor:pointer; padding:8px; font-weight:600;">
                    +10 Emp
                </button>
            </div>

            <div style="display:flex; gap:8px;">
                <button type="submit" name="cheat_sub_stat" style="flex:1; background:#fef2f2; color:#b91c1c; border:1px solid #fecaca; border-radius:6px; cursor:pointer; padding:8px; font-weight:600;">
                    -100 Atk/Def
                </button>
                <button type="submit" name="cheat_add_stat" style="flex:1; background:#f0fdf4; color:#15803d; border:1px solid #bbf7d0; border-radius:6px; cursor:pointer; padding:8px; font-weight:600;">
                    +100 Atk/Def
                </button>
            </div>
            
            <hr style="border:0; border-top:1px solid #e2e8f0; margin:4px 0;">

            <div style="display:flex; gap:8px;">
                <select name="ending_id" style="flex:1; background:#ffffff; color:#334155; border:1px solid #cbd5e1; border-radius:6px; padding:8px; font-family:inherit;">
                    <option value="1">Ending 1</option>
                    <option value="2">Ending 2</option>
                    <option value="3">Ending 3</option>
                    <option value="4">Ending 4</option>
                    <option value="5">Ending 5</option>
                </select>
                <button type="submit" name="cheat_force_ending" style="flex:1; background:#3b82f6; color:#ffffff; border:none; border-radius:6px; cursor:pointer; padding:8px; font-weight:600;">
                    Jump ➔
                </button>
            </div>
        </form>
    </div>';
}
?>
