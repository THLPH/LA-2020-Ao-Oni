<?php
require_once "init.php";
require_once "shop_data.php";

if ($day > 31) {
    header("Location: ending.php");
    exit();
}

if ($class === "UNASSIGNED") {
    header("Location: choice.php");
    exit();
}

$base_atk = $atk;
$base_def = $def;

$wep_bonus = $wep > 0 ? $weapons[$wep]["atk_bonus"] : 0;
$cyb_bonus = $cyb > 0 ? $cybernetics[$cyb]["def_bonus"] : 0;

$total_atk = $base_atk + $wep_bonus;
$total_def = $base_def + $cyb_bonus;

// Logic: Bounty days are every 5th day OR day 31
$is_bounty_day = ($day % 5 === 0 || $day == 31);
$bounty_attr = $is_bounty_day ? "" : "btn-dimmed";

$bg_dir = "assets/bg/";

// 2. Get all images. We'll use a simpler glob search.
$bg_options = glob($bg_dir . "*.png");

// 3. Pick the image
if (!empty($bg_options)) {
    $selected_bg = $bg_options[array_rand($bg_options)];
} else {
    $selected_bg = "assets/bg/bg1.png";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TRUST GLOBAL - HUB</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body class="hub-body" style="background-image: url('<?php echo $selected_bg; ?>');">
        <div class="terminal-container hub-mode">
            <div class="header-cell">
                <span>>>>> SYSTEM_HUB</span>
                <span>[ DAY <?php echo $day; ?>/31 ] </span>
            </div>
            <div class="content-cell">
                <span class="sys-text">>>>> OPERATOR: <?php echo htmlspecialchars(
                $user
            ); ?> | UPLINK: STABLE </span>
                <div class="stats-panel">
                    <div class="stat-line">
                        <span>CLASS:</span>
                        <span> <?php echo $class; ?> </span>
                    </div>
                    <div class="stat-line">
                        <span>CREDITS:</span>
                        <span> <?php echo $cred; ?> ƕ </span>
                    </div>
                    <div class="stat-line">
                        <span>OFFENSE:</span>
                        <span> <?php echo $total_atk; ?> [BASE: <?php echo $base_atk; ?> + WEP: <?php echo $wep_bonus; ?>] </span>
                    </div>
                    <div class="stat-line">
                        <span>DEFENSE:</span>
                        <span> <?php echo $total_def; ?> [BASE: <?php echo $base_def; ?> + CYB: <?php echo $cyb_bonus; ?>] </span>
                    </div>
                    <div class="stat-line">
                        <span>EMPATHY:</span>
                        <span> <?php echo $emp; ?> </span>
                    </div>
                    <div class="action-menu">
                        <a href="work.php" class="action-btn">Pick up a Job</a>
                        <a href="event.php" class="action-btn">Walk the Streets</a>
                        <a href="fight.php" class="action-btn <?php echo $bounty_attr; ?>">Hunt a Bounty </a>
                        <a href="shop.php" class="action-btn">Visit the Vendor</a>
                        <a href="pass.php" class="action-btn">Kill some Time</a>
                    </div>
                    <div class="utility-menu" style="display: flex; justify-content: space-between; margin-top: 20px;">
                        <a href="leaderboard.php" class="sys-text" style="text-decoration: none;">[ VIEW_RANKINGS ]</a>
                        <a href="logout.php" class="sys-text" style="text-decoration: none; color: var(--accent-red);">[ DISCONNECT ]</a>
                    </div>
                </div>
            </div>
    </body>
</html>