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

// Advisor: Calculate the narrative advisor text based on Empathy thresholds
$advisor_text = "";

if ($emp >= 80) {
    $advisor_text = "The city's rot hasn't touched your core. You're a ghost of a world that actually cared. Most people don't survive long with a heart this loud.";
} elseif ($emp >= 50) {
    $advisor_text = "You're still looking for the human element in every dark alley. It is a dangerous habit, but one that keeps you feeling like a person.";
} elseif ($emp >= 30) {
    $advisor_text = "You haven't traded your soul for credits just yet, though you've definitely started checking the market prices.";
} elseif ($emp >= 0) {
    // STARTING RANGE (0 to 29)
    $advisor_text = "You're just another operator in the neon fog. Neutral. Functional. You're doing what you have to do to keep the lights on.";
} elseif ($emp >= -15) {
    $advisor_text = "The noise of the city is starting to fade. You're becoming efficient. Practical. You don't lose sleep over the job anymore.";
} else {
    // -30 AND BELOW
    $advisor_text = "There is no hesitation left in your hands. You don't see people anymore. You just see targets, obstacles, and the payout.";
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
                    <div class="stat-line" style="flex-direction: column; align-items: flex-start; gap: 8px; border-top: 1px dashed #444; padding-top: 12px; margin-top: 12px;">
                        <span style="color: #777; font-size: 0.85em; letter-spacing: 2px;">PSYCH-EVALUATION:</span>
                        <span style="color: --fg-black; font-style: italic; line-height: 1.4;"> <?php echo $advisor_text; ?> </span>
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