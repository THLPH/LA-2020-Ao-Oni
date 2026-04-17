<?php
require_once 'init.php';
require_once 'event_data.php';

// --- DAY 30 SECRET OVERRIDE ---
if ($day == 30) {
    if ($emp >= 80) {
        // High Empathy: The Manga Event
        $events[30] = [
            'img' => 'assets/event/manga.png',
            'text' => 'You notice the cyber-veteran beggar from before. He tells you a rambling story about the old world and offers to sell you a rare "manga". He cryptically advises you to "face the demon unburdened by steel" if you wish to truly understand her.',
            'choice1_text' => 'Buy the Manga (500 ƕ)',
            // We use special keys here so the processor knows to SET them, not ADD them
            'choice1_rewards' => ['cred' => -500, 'sec' => true, 'set_wep' => 0, 'set_cyb' => 0],
            'choice2_text' => 'Decline the offer',
            'choice2_rewards' => ['cred' => -100, 'emp' => 20]
        ];
    } else {
        // Low Empathy: Normal Day 30
        $events[30]['text'] = 'You ignore a rambling beggar on the street. ' . $events[30]['text'];
    }
}

// 1. Get the current day's event data
$current_event = $events[$day] ?? null; 

if (!$current_event) {
    header("Location: index.php"); // Failsafe
    exit();
}

// 2. PROCESSOR LOGIC: Did the user click a choice?
if (isset($_GET['choice'])) {
    $choice_made = $_GET['choice']; 
    
    // Determine which reward array to look at
    $reward_key = ($choice_made == '1') ? 'choice1_rewards' : 'choice2_rewards';
    $rewards = $current_event[$reward_key];

    // Process the rewards
    foreach ($rewards as $stat_name => $value) {
        // Special catches for the secret ending flags
        if ($stat_name === 'sec') {
            $sec = $value; 
        } elseif ($stat_name === 'set_wep') {
            $wep = $value; // Force unequip weapon
        } elseif ($stat_name === 'set_cyb') {
            $cyb = $value; // Force unequip cybernetics
        } else {
            // Standard stat addition
            $$stat_name += $value; 
        }
    }

    // Advance the day and redirect
    $day += 1; 
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRUST GLOBAL - EVENT LOG</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="hub-body">

    <div class="terminal-container hub-mode">
        
        <div class="header-cell">
            <span>>>>> EVENT_LOG</span>
            <span>[ DAY <?php echo $day; ?>/31]</span>
        </div>
        
        <div class="content-cell">
            
            <span class="notice-text">>>>> ENCOUNTER DETECTED</span>
            
            <div class="event-image-frame">
                <img src="assets/event/<?php echo $current_event['img']; ?>" alt="Event Scan">
            </div>

            <p class="status-text"><?php echo $current_event['text']; ?></p>

            <div class="action-menu">
                <a href="event.php?choice=1" class="action-btn">
                    <?php echo $current_event['choice1_text']; ?>
                </a>
                
                <a href="event.php?choice=2" class="action-btn">
                    <?php echo $current_event['choice2_text']; ?>
                </a>

                <a href="index.php" class="action-btn">
                    Return to Hub
                </a>
            </div>

        </div>
    </div>

</body>
</html>