<?php


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['archetype'])) {
    $selection = $_POST['archetype'];

    switch ($selection) {
        case 'street':
            $class = "STREET"; $atk = 25; $def = 15; $cred = 50;
            break;
        case 'corpo':
            $class = "CORPO"; $atk = 10; $def = 10; $cred = 500;
            break;
        case 'nomad':
            $class = "NOMAD"; $atk = 15; $def = 30; $cred = 150;
            break;
    }

    $day = 1;
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
    
    <style>
        body {
            height: 100vh;
            width: 100vw;
            margin: 0;
            overflow: hidden; 
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--bg-cream);
        }

        .terminal-container.choice-mode {
            width: 95%;
            max-width: 900px; 
            height: 92vh; 
            display: flex;
            flex-direction: column;
        }

        .content-cell {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            padding: 2vh 2rem;
            overflow: hidden;
        }

        form {
            width: 100%;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            gap: 1.5vh;
            overflow: hidden;
        }

        .choice-btn {
            width: 100%;
            flex: 1; 
            display: block; 
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            font-family: inherit;
            min-height: 0; 
        }

        .choice-row {
            display: flex;
            width: 100%;
            height: 100%;
            border: var(--border-width) solid var(--fg-dark);
            background: var(--bg-cream);
            box-sizing: border-box;
            overflow: hidden;
        }

        .choice-btn:hover .choice-row {
            border-color: var(--accent-red);
            box-shadow: 6px 6px 0px rgba(139, 28, 28, 0.15);
        }

        .portrait-frame {
            width: 35%;
            max-width: 280px; 
            height: 100%;
            flex-shrink: 0;
            border-right: var(--border-width) solid var(--fg-dark);
            background: #000; 
            position: relative;
        }

        .portrait-frame img {
            width: 100%;
            height: 100%;
            object-fit: contain; 
            object-position: center;
            opacity: 0.8;
        }

        .choice-btn:hover img {
            opacity: 1;
        }

        /* TEXT */
        .choice-details {
            padding: 2vh 25px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start; 
            align-items: flex-start;
            text-align: left;
            overflow: hidden;
            flex-grow: 1;
        }

        .spec-label {
            font-size: clamp(1.1rem, 2.8vh, 1.6rem); 
            color: var(--fg-dark);
            font-weight: bold;
            margin-bottom: 4px;
            text-transform: uppercase;
            width: 100%;
        }
        
        .choice-btn:hover .spec-label {
            color: var(--accent-red);
        }

        .spec-stats {
            font-size: clamp(0.75rem, 1.6vh, 1rem);
            font-weight: bold;
            color: var(--accent-grey);
            margin-bottom: 10px;
            width: 100%;
        }

        .spec-desc {
            font-size: clamp(0.7rem, 1.5vh, 0.9rem);
            color: var(--fg-dark);
            line-height: 1.3;
            width: 100%;
            /* Prevents overflow if screen is very short */
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;  
            overflow: hidden;
        }

        .sys-text {
            margin-bottom: 1.5vh;
        }
    </style>
</head>
<body>

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
                            <img src="assets/char1.png" alt="Operator Portrait">
                        </div>
                        <div class="choice-details">
                            <span class="spec-label">STREET</span>
                            <span class="spec-stats">ATK: 25 | DEF: 15 | CRED: 50</span>
                            <span class="spec-desc">They say if you wanna understand the streets, you gotta live 'em. Gangs, fixers, dolls, small-time pushers - you were raised by them all. Down here the law of the jungle dictates the weak serve the strong.</span>
                        </div>
                    </div>
                </button>

                <button type="submit" name="archetype" value="corpo" class="choice-btn">
                    <div class="choice-row">
                        <div class="portrait-frame">
                            <img src="assets/char2.png" alt="Operator Portrait">
                        </div>
                        <div class="choice-details">
                            <span class="spec-label">CORP</span>
                            <span class="spec-stats">ATK: 10 | DEF: 10 | CRED: 500</span>
                            <span class="spec-desc">Few leave the corporate world with their lives - fewer still with their souls intact. You've been there - you've bent the rules, exploited secrets and weaponized information. There's no such thing as a fair game, only winners and losers.</span>
                        </div>
                    </div>
                </button>

                <button type="submit" name="archetype" value="nomad" class="choice-btn">
                    <div class="choice-row">
                        <div class="portrait-frame">
                            <img src="assets/char3.png" alt="Operator Portrait">
                        </div>
                        <div class="choice-details">
                            <span class="spec-label">NOMAD</span>
                            <span class="spec-stats">ATK: 15 | DEF: 30 | CRED: 150</span>
                            <span class="spec-desc">Roaming places, looting scrapyards, raiding fuel depots - life on the road wasn't easy. But growing up in a nomad clan has its perks. Honesty, integrity, and a love of freedom - qualities that few possess, and no amount of money can buy.</span>
                        </div>
                    </div>
                </button>

            </form>
        </div>
    </div>

</body>
</html>