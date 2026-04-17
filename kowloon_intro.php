<?php 
require_once 'init.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Kowloon Mystery - Transition</title>
    <style>
        /* Base Page Setup */
        body {
            background-color: #030303;
            color: #c4c4c4;
            font-family: 'Courier New', Courier, monospace;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
        }

        /* Container for the transition screen */
        .lore-container {
            display: flex;
            max-width: 1200px;
            width: 95%;
            height: 600px; /* Fixed height for the 1:1 ratio */
            background: #0a0a0a;
            border: 1px solid #1a1a1a;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.9);
            opacity: 0;
            animation: fadeIn 2.5s ease-in-out forwards;
        }

        /* Image Section - Forced 1:1 */
        .image-panel {
            flex: 0 0 600px; /* Width fixed at 600px */
            height: 600px;    /* Height fixed at 600px */
            background-image: url('assets/kowloon.jpg');
            background-size: cover;
            background-position: center;
            border-right: 1px solid #222;
            position: relative;
        }

        /* Dark gradient overlay on the image */
        .image-panel::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 30%;
            background: linear-gradient(to right, transparent, #0a0a0a);
        }

        /* Text Section */
        .text-panel {
            flex: 1;
            padding: 40px 50px;
            overflow-y: auto;
            box-sizing: border-box;
            scrollbar-width: thin;
            scrollbar-color: #8b1c1c #0a0a0a;
            display: flex;
            flex-direction: column;
        }

        /* Custom Scrollbar */
        .text-panel::-webkit-scrollbar { width: 6px; }
        .text-panel::-webkit-scrollbar-track { background: #0a0a0a; }
        .text-panel::-webkit-scrollbar-thumb { background-color: #8b1c1c; }

        /* Typography & Readability */
        h1 {
            color: #8b1c1c; 
            font-size: 1.4rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-left: 4px solid #8b1c1c;
            padding-left: 15px;
            margin-top: 0;
            margin-bottom: 30px;
        }

        p {
            line-height: 1.8;
            font-size: 0.95rem;
            margin-bottom: 25px;
            text-align: left; /* Changed from justify to improve flow */
            color: #a0a0a0;
        }

        .highlight {
            color: #dcdcdc;
            font-weight: bold;
        }

        /* No-JS Button (Anchor Tag) */
        .action-button {
            display: inline-block;
            margin-top: auto;
            padding: 15px 30px;
            background: transparent;
            border: 1px solid #444;
            color: #888;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.8rem;
            width: fit-content;
            transition: all 0.3s ease;
        }

        .action-button:hover {
            background: #8b1c1c;
            color: white;
            border-color: #8b1c1c;
            box-shadow: 0 0 15px rgba(139, 28, 28, 0.4);
        }

        /* Retro Scanline Effect */
        .scanlines {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: linear-gradient(
                rgba(18, 16, 16, 0) 50%, 
                rgba(0, 0, 0, 0.25) 50%
            );
            background-size: 100% 4px;
            pointer-events: none;
            z-index: 10;
            opacity: 0.6;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: scale(0.98); }
            100% { opacity: 1; transform: scale(1); }
        }

        /* Mobile Adjustments */
        @media (max-width: 1100px) {
            .lore-container { height: auto; flex-direction: column; width: 90%; }
            .image-panel { flex: 0 0 400px; width: 100%; height: 400px; border-right: none; }
        }
    </style>
</head>
<body>

    <div class="scanlines"></div>

    <div class="lore-container">
        <div class="image-panel"></div>

        <div class="text-panel">
            <h1>The Kowloon Mystery: The 1992 Hong Kong Massacre</h1>
            
            <p>The Hong Kong Massacre, known locally as <span class="highlight">Duk Mo Je Haang</span> (The Night Parade of One Demon), remains one of the city's most documented yet intentionally obscured mass-casualty events. At the height of the violence, the volume of arterial spray from the victims was so significant that it overwhelmed the local infrastructure, mixing with the city’s drainage and ventilation systems. This created the <span class="highlight">Hung Jyu</span> (Red Rain) a phenomenon where a fine crimson mist hung over the narrow streets of Kowloon, coating every surface in a layer of sticky residue.</p>

            <p>Official government reports and state-aligned media outlets maintain that the massacre was the result of a coordinated gang war between rival triads using heavy, unauthorized weaponry. According to the state narrative, the scale of the carnage was a logistical byproduct of firearms discharged within the dense urban environment of the district. This explanation is frequently challenged by independent forensic analysts who point to a glaring discrepancy in the evidence: while the ground was littered with spent shell casings and the walls were riddled with bullet holes, the vast majority of the deceased showed no signs of ballistic trauma. Instead, the fatalities were almost exclusively attributed to massive, clean lacerations caused by a single, edged weapon.</p>

            <p>The physical remains of the site after the Duk Mo Je Haang described a scene of total atmospheric saturation. Witnesses and first responders detailed a literal river of blood flowing through the gutters, deep enough to soak through the boots of anyone entering the perimeter. The walls of the alleyways were painted red from floor to ceiling, obscured by deep slashes on the concrete. Amidst this wreckage, survivor testimony consistently centers on a figure described as nearly two meters tall, though the true height remains a subject of debate. This figure possessed long, flowy hair that seemed to trail behind them like a shroud as they moved through the carnage. Witnesses claim the individual moved with a terrifying singular focus, ignoring the hail of bullets meant to stop them and instead methodically dismantling every person in sight with a sword that left the architecture of Kowloon as scarred as the victims themselves.</p>

            <p>The 1993 demolition was the ultimate cleanup. There are no records of the "Ogre" after the demolition. They didn't just tear down the blocks; they hauled away the evidence. Thousands of tons of blood-soaked concrete were carted off and dumped as landfill. If the "Ogre" left anything behind, it’s currently buried under the old Kai Tak runway or a housing estate.</p>

            <a href="kowloon_enhancement.php" class="action-button">VIEW CONTRACT</a>
        </div>
    </div>

</body>
</html>