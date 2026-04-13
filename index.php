<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRUST GLOBAL - HUB</title>
    <link rel="stylesheet" href="styles.css">
    
    <style>
        /* Specific Hub Styles */
        .stats-panel {
            border-bottom: 2px dashed var(--fg-dark);
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .stat-line {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 0.95rem;
            font-weight: bold;
        }

        .action-menu {
            display: flex;
            flex-direction: column;
            gap: 15px; /* spacing between the buttons */
        }

        .action-btn {
            display: block;
            width: 100%;
            padding: 15px;
            text-align: center;
            border: var(--border-width) solid var(--fg-dark);
            background: var(--fg-dark);
            color: var(--bg-cream);
            font-weight: bold;
            font-size: 1.1rem;
            text-transform: uppercase;
            text-decoration: none;
            box-sizing: border-box;
            transition: all 0.2s ease;
        }

        .action-btn:hover {
            background: var(--accent-red);
            border-color: var(--accent-red);
            box-shadow: 4px 4px 0px rgba(18, 18, 18, 0.3);
            color: #fff;
        }
    </style>
</head>

<body style="
    background-image: url('assets/bg.png'); 
    background-size: cover; 
    background-position: center; 
    background-attachment: fixed; 
    margin: 0; 
    display: flex; 
    justify-content: center; 
    align-items: center; 
    height: 100vh;
">

    <div class="terminal-container" style="
        background-color: var(--bg-cream); 
        width: 95%; 
        max-width: 500px; 
        border: 3px solid #121212; 
        box-shadow: 15px 15px 0px rgba(0, 0, 0, 0.8);
    ">
        
        <div class="header-cell">
            <span>>>>> SYSTEM_HUB</span>
            <span>[ DAY <?php echo $day; ?>/30 ]</span>
        </div>
        
        <div class="content-cell">
            <span class="sys-text">>>>> OPERATOR: <?php echo htmlspecialchars($user); ?> | UPLINK: STABLE</span>
            
            <div class="stats-panel">
                <div class="stat-line"><span>CLASS:</span> <span><?php echo $_SESSION['class'] ?? 'UNKNOWN'; ?></span></div>
                <div class="stat-line"><span>CREDITS:</span> <span><?php echo $cred; ?> ƕ</span></div>
                <div class="stat-line"><span>OFFENSE:</span> <span><?php echo $total_atk; ?> [BASE: <?php echo $base_atk; ?> + WEP: <?php echo $wep; ?>]</span></div>
                <div class="stat-line"><span>DEFENSE:</span> <span><?php echo $total_def; ?> [BASE: <?php echo $base_def; ?> + CYB: <?php echo $cyb; ?>]</span></div>
                <div class="stat-line"><span>EMPATHY:</span> <span><?php echo $emp; ?></span></div>
            </div>

            <div class="action-menu">
                <a href="work.php" class="action-btn">Work</a>
                <a href="event.php" class="action-btn">Look Around</a>
                <a href="fight.php" class="action-btn">Fight</a>
                <a href="shop.php" class="action-btn">Shop</a>
                <a href="pass.php" class="action-btn">Pass</a>
            </div>
            
        </div>
    </div>

</body>
</html>