<?php
require_once 'init.php';
require_once 'shop_data.php';

// Ensure the user is actually logged in before trying to save data
if (isset($_SESSION['username'])) {
    
    // 1. Calculate the final player power
    $wep_bonus = ($wep > 0 && isset($weapons[$wep])) ? $weapons[$wep]['atk_bonus'] : 0;
    $cyb_bonus = ($cyb > 0 && isset($cybernetics[$cyb])) ? $cybernetics[$cyb]['def_bonus'] : 0;

    $player_atk = $atk + $wep_bonus;
    $player_def = $def + $cyb_bonus;

    $final_power = $player_atk * (0.8 * $player_def);

    // 2. Package the data to be saved
    $run_data = [
        'name'    => $user,
	'class'   => $class,
        'power'   => $final_power,
        'ending'  => $end,
        'credits' => $cred,
        'empathy' => $emp
    ];

    // 3. Append the data to leaderboard.txt
    $file = 'leaderboard.txt';
    // FILE_APPEND adds to the end of the file, LOCK_EX prevents data corruption if multiple people finish at once
    file_put_contents($file, json_encode($run_data) . PHP_EOL, FILE_APPEND | LOCK_EX);
    
    // 4. Destroy the session to officially log the user out
    session_unset();
    session_destroy();
}

// 5. Redirect to the leaderboard
header("Location: leaderboard.php");
exit();
?>