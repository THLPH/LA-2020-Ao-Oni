<?php
require_once 'init.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['archetype'])) {
    $selection = $_POST['archetype'];

    switch ($selection) {
        case 'street':
            $class = "STREET"; $atk = 30; $def = 25; $cred = 50;
            break;
        case 'corpo':
            $class = "CORPO"; $atk = 10; $def = 10; $cred = 600;
            break;
        case 'nomad':
            $class = "NOMAD"; $atk = 15; $def = 30; $cred = 200;
            break;
    }

    $day = 1;
    session_write_close();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TRUST GLOBAL - SPEC_SELECTION</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="choice-body">

    <div class="terminal-container choice-mode">
        <div class="header-cell">
            <span>>>>> TRUST_GLOBAL</span>
            <span>[ LIFE_PATH ]</span>
        </div>
        
        <div class="content-cell">
            <span class="sys-text">
                STATUS: ANALYZING BIOMETRIC UPLINK...<br>
                SELECT BACKGROUND SPECIFICATION:
            </span>

            <form method="POST">
                
                <button type="submit" name="archetype" value="street" class="choice-btn">
                    <div class="choice-row">
                        <div class="portrait-frame">
                            <img src="assets/char/char1.png" alt="Operator Portrait">
                        </div>
                        <div class="choice-details">
                            <span class="spec-label">STREET</span>
                            <span class="spec-stats">ATK: 30 | DEF: 25 | CRED: 50</span>
                            <span class="spec-desc">They say if you wanna understand the streets, you gotta live 'em. Gangs, fixers, dolls, small-time pushers - you were raised by them all. Down here the law of the jungle dictates the weak serve the strong.</span>
                        </div>
                    </div>
                </button>

                <button type="submit" name="archetype" value="corpo" class="choice-btn">
                    <div class="choice-row">
                        <div class="portrait-frame">
                            <img src="assets/char/char2.png" alt="Operator Portrait">
                        </div>
                        <div class="choice-details">
                            <span class="spec-label">CORP</span>
                            <span class="spec-stats">ATK: 10 | DEF: 10 | CRED: 600</span>
                            <span class="spec-desc">Few leave the corporate world with their lives - fewer still with their souls intact. You've been there - you've bent the rules, exploited secrets and weaponized information. There's no such thing as a fair game, only winners and losers.</span>
                        </div>
                    </div>
                </button>

                <button type="submit" name="archetype" value="nomad" class="choice-btn">
                    <div class="choice-row">
                        <div class="portrait-frame">
                            <img src="assets/char/char3.png" alt="Operator Portrait">
                        </div>
                        <div class="choice-details">
                            <span class="spec-label">NOMAD</span>
                            <span class="spec-stats">ATK: 15 | DEF: 30 | CRED: 200</span>
                            <span class="spec-desc">Roaming places, looting scrapyards, raiding fuel depots - life on the road wasn't easy. But growing up in a nomad clan has its perks. Honesty, integrity, and a love of freedom - qualities that few possess, and no amount of money can buy.</span>
                        </div>
                    </div>
                </button>

            </form>
        </div>
    </div>

</body>
</html>