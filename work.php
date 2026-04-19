<?php
require_once 'init.php';
require_once 'work_data.php';

// 1. Get the current day's job offer
$current_job = $jobs[$day] ?? null; 

if (!$current_job) {
    header("Location: index.php"); // Failsafe if no job exists for today
    exit();
}

// 2. PROCESSOR LOGIC: Did the user accept the gig?
if (isset($_GET['action']) && $_GET['action'] == 'accept') {
    
    $rewards = $current_job['rewards'];

    // Apply the job rewards using variable variables
    foreach ($rewards as $stat_name => $value) {
        $$stat_name += $value; 
    }

    // Advance the day and redirect back to hub
    $day += 1; 
    header("Location: index.php");
    exit();
}

//Advisor
$work_outlook = "";
if ($emp >= 50) {
    $work_outlook = "You filter through the grime of the gig-board, searching for a payday that won't leave your hands feeling filthy.";
} elseif ($emp >= 0) {
    $work_outlook = "You scan the list of available scraps. It's all honest work, or at least honest enough for this sector.";
} else {
    $work_outlook = "You're just looking for high-yield contracts. The human cost of the job is just another line item you've learned to ignore.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRUST GLOBAL - GIG BOARD</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="hub-body">

    <div class="terminal-container hub-mode">
        
        <div class="header-cell">
            <span>>>>> GIG_BOARD</span>
            <span>[ DAY <?php echo $day; ?>/31 ]</span>
        </div>
        
        <div class="content-cell">

            <span class="contract-text">>>>> AVAILABLE CONTRACT: <?php echo $current_job['title']; ?></span>
            <p>
	         <?php echo $work_outlook; ?>
	    </p>
            <div class="work-image-frame">
                <img src="assets/work/<?php echo $current_job['img']; ?>" alt="Job Location">
            </div>

            <p class="status-text"><?php echo $current_job['text']; ?></p>

            <div class="action-menu">
                <a href="work.php?action=accept" class="action-btn">
                    <?php echo $current_job['accept_text']; ?>
                </a>

                <a href="index.php" class="action-btn">
                    <?php echo $current_job['decline_text']; ?>
                </a>
            </div>

        </div>
    </div>

</body>
</html>