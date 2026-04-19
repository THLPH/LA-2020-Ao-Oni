<?php
require_once 'init.php';
require_once 'shop_data.php';

// 1. Calculate Player Power
$wep_bonus = ($wep > 0) ? $weapons[$wep]['atk_bonus'] : 0;
$cyb_bonus = ($cyb > 0) ? $cybernetics[$cyb]['def_bonus'] : 0;

$player_atk = $atk + $wep_bonus;
$player_def = $def + $cyb_bonus;

$player_power = $player_atk * (0.8 * $player_def);


// 2. The Enemy Roster
$enemies = [
    5  => ['name' => 'Alley Thug', 'atk' => 5, 'def' => 5, 'reward' => 300, 'img_id' => 1],
    10 => ['name' => 'Rogue Drone', 'atk' => 12, 'def' => 10, 'reward' => 550, 'img_id' => 2],
    15 => ['name' => 'Syndicate Enforcer', 'atk' => 25, 'def' => 20, 'reward' => 1100, 'img_id' => 3],
    20 => ['name' => 'Corp Mecha', 'atk' => 45, 'def' => 35, 'reward' => 1600, 'img_id' => 4],
    25 => ['name' => 'Samurai Cyberpsycho', 'atk' => 70, 'def' => 60, 'reward' => 2200, 'img_id' => 5],
    30 => ['name' => 'The Radiant Knight', 'atk' => 100, 'def' => 80, 'reward' => 3500, 'img_id' => 6],
    31 => ['name' => 'Madame Oni', 'atk' => 150, 'def' => 100, 'reward' => 0, 'img_id' => 7]
];

// Check if there is an enemy today
$current_enemy = $enemies[$day] ?? null;
$is_boss_fight = ($current_enemy && $day == 31) ? 'boss-mode' : '';

// Determine the correct background and enemy image paths
if ($current_enemy) {
    $img_id = $current_enemy['img_id'];
    $bg_image = "assets/fight/bg{$img_id}.png";
    $enemy_image = "assets/fight/enemy{$img_id}.png";
} else {
    // Default background for non-enemy days
    $bg_image = "assets/fight/bg8.png";
    $enemy_image = ""; 
}

// Advisor: Power assessment
$threat_assessment = "";
if ($current_enemy) {
    $enemy_pwr = $current_enemy['atk'] * (0.8 * $current_enemy['def']);
    
    if ($player_power >= $enemy_pwr * 1.5) {
        $threat_assessment = "Target is severely outmatched. Bounty should be swift.";
    } elseif ($player_power >= $enemy_pwr) {
        $threat_assessment = "Threat level moderate. Maintain tactical focus. Be careful.";
    } else {
        $threat_assessment = "WARNING: Target outclasses current hardware. Survival probability low. Please be advised.";
    }
}

// Variables to handle the outcome screen
$combat_resolved = false;
$combat_message = "";
$player_won_combat = false;
$display_day = $day; // Keep the day number static for the header UI before we advance it

// 3. --- PROCESSOR LOGIC ---
if (isset($_GET['action']) && $_GET['action'] == 'engage' && $current_enemy) {
    
    // Calculate Enemy Power
    $enemy_power = $current_enemy['atk'] * (0.8 * $current_enemy['def']);
    
    // Did the player win?
    $player_won_combat = ($player_power >= $enemy_power);

    // BOSS FIGHT LOGIC (DAY 31)
    if ($day == 31) {
        if ($player_won_combat) {
            // Win conditions
            if ($emp >= 50) {
                $end = 2; // Ending 2: Won + High Empathy
            } else {
                $end = 3; // Ending 3: Won + Low Empathy
            }
        } else {
            // Loss conditions
            if ($sec == true && $wep == 0 && $cyb == 0) {
                $end = 5; // Ending 5: The dinner (Manga + Unarmed)
            } else {
                $end = 4; // Ending 4: Normal death
            }
        }
        
        // Save and send to ending
        header("Location: ending.php");
        exit();
    } 
    // NORMAL FIGHT LOGIC (DAYS 5-30)
    else {
        if ($player_won_combat) {
            $cred += $current_enemy['reward']; // Give reward if they win
            $combat_message = "Target eliminated. You recovered " . $current_enemy['reward'] . " ƕ from the scene.";
        } else {
            $combat_message = "Tactical retreat forced. You were overpowered by the target.";
        }
        
        // Advance day, but trigger the results screen instead of redirecting
        $day += 1;
        $combat_resolved = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRUST GLOBAL - COMBAT ZONE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="hub-body" style="background-image: url('<?php echo $bg_image; ?>'); background-size: cover; background-position: center;">

    <div class="terminal-container hub-mode <?php echo $is_boss_fight; ?>">
        
        <div class="header-cell">
            <span>>>>> COMBAT_ZONE</span>
            <span>[ DAY <?php echo $display_day; ?>/30 ]</span>
        </div>
        
        <div class="content-cell">
            
            <?php if ($combat_resolved): ?>
                
                <?php if ($player_won_combat): ?>
                    <span class="warning-text success-text">>>>> COMBAT RESOLVED: VICTORY</span>
                <?php else: ?>
                    <span class="warning-text">>>>> COMBAT RESOLVED: DEFEAT</span>
                <?php endif; ?>

                <div class="combat-image-frame">
                    <img src="<?php echo $enemy_image; ?>" alt="Hostile Target">
                </div>

                <p class="status-text"><?php echo $combat_message; ?></p>
                
                <div class="action-menu" style="margin-top: 20px;">
                    <a href="index.php" class="action-btn">Return to Hub</a>
                </div>

            <?php elseif ($current_enemy): ?>
                
                <span class="warning-text">>>>> HOSTILE DETECTED: <?php echo $current_enemy['name']; ?></span>
                
                <div class="combat-image-frame">
                    <img src="<?php echo $enemy_image; ?>" alt="Hostile Target">
                </div>

                <div class="status-text">
                    [TARGET POWER] : <?php echo $current_enemy['atk'] * (0.8 * $current_enemy['def']); ?><br>
                    [YOUR POWER]   : <?php echo $player_power; ?>
                </div>

		<div class="status-text" style="margin-top: 15px; padding: 10px; border: 1px solid #444; background: rgba(20, 20, 20, 0.8);">
		    <span style="color: #a0a0a0; font-size: 0.85em;">>>>> TACTICAL ADVISORY:</span><br>
		    <span style="color: <?php echo ($player_power < ($current_enemy['atk'] * (0.8 * $current_enemy['def']))) ? '#ff4444' : '#ffffff'; ?>;">
		        <?php echo $threat_assessment; ?>
		    </span>
		</div>

                <div class="action-menu">
                    <a href="fight.php?action=engage" class="action-btn">Engage Target</a>
                    
                    <?php if ($day < 31): ?>
                        <a href="index.php" class="action-btn">Flee</a>
                    <?php endif; ?>
                </div>

            <?php else: ?>
                
                <span class="sys-text">>>>> TACTICAL SCANNER ACTIVE...</span>
                <p class="status-text">The streets are quiet. No hostile signatures detected in the immediate vicinity.</p>
                
                <div class="action-menu" style="margin-top: 20px;">
                    <a href="index.php" class="action-btn">Return to Hub</a>
                </div>
                
            <?php endif; ?>

        </div>
    </div>

</body>
</html>