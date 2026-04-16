<?php
require_once 'init.php';

// The Ending Data Library
$ending_id = [
    1 => [
        "title" => "Contract Expired",
        "image" => "assets/ending1.png",
        "text" => "The contract expired, the target is still alive. TRUST Global does not tolerate delays or loose ends.\nYour cheap apartment's door flung open as all your tech get disabled.\nMaybe...you should try doing your job next time? Just a thought."
    ],
    2 => [
        "title" => "Knight in Neon Armor",
        "image" => "assets/ending2.png",
        "text" => "You stood victorious but chose to lower your blade. Recognizing your mercy, she repayed the debt by cleaning up the hitman sent after you.\nShe walked away and vanished into the rainy neon city.\nBut with a failed contract and a dead cleanup crew, are you truly free?"
    ],
    3 => [
        "title" => "Employee of the Day",
        "image" => "assets/ending3.png",
        "text" => "The target was eliminated with a single slash. She never stood a chance against you, oh great hero.\nYour promotion cleared, and the bounty was wired to your account. You won't have to worry about rent or food for the next whole 3 days. Most people would kill for that kind of luxury.\nYou never learned her name or the stories she wanted to tell, and TRUST Global prefers it that way.\nPlease check your terminal for your next assignment."
    ],
    4 => [
        "title" => "End of a Life",
        "image" => "assets/ending4.png",
        "text" => "Your strength pales in comparison to the Legend of the Walled City, but she didn't leave you to fade alone. As the construction site loomed in the distant sunset, she gently leaned you against the shoji screens.\nHer voice, low and calm, began to tell a story. Not of this fight, but of an ancient city and its forgotten people. A strange sense of peace settled over you.\nThe roar of the excavators became a rhythmic lullaby, and the passage of time melted into the orange sky. Your lifeless body listened to the cadence of the woman's story until the words drifted into a soft, indistinct hum.\nYou are just another ghost in this decaying city. Maybe try buying better gear next time?"
    ],
    5 => [
        "title" => "Here in Vernal Terrene",
        "image" => "assets/ending5.png",
        "text" => "You approached the demon completely unarmed, offering nothing but a blood-stained relic from a forgotten era. Seeing your vulnerability, the Ogre lowered her blade.\nFor the first time in three decades, the cycle of violence broke over a simple, quiet meal. For once, nobody is paying for your time. For once, in this city, you're just a person having dinner. And for once, you feel like your companion is actually listening.\nSometimes, it isn't about saving the world, it's about saving yourself.\nHappy Ending? Wrong city, wrong people. But for now, enjoy what you have. Many would kill for it."
    ]
];

// Select the specific ending data using the $end shortcut from init.php
$currentEnding = $ending_id[$end] ?? $ending_id[1];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($currentEnding['title']); ?></title>
    <style>
        /* Standalone Cinematic Styles */
        body {
            margin: 0;
            padding: 0;
            background-color: #050505;
            color: #dcdcdc;
            font-family: 'Georgia', 'Times New Roman', serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .cinematic-container {
            max-width: 800px;
            padding: 40px 20px;
            text-align: center;
            animation: fadeUp 2.5s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .ending-image {
            width: 100%;
            max-height: 45vh;
            object-fit: cover;
            border: 1px solid #222;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.9);
            margin-bottom: 40px;
            filter: grayscale(30%) contrast(120%);
        }

        .ending-title {
            font-size: 2.5rem;
            font-weight: normal;
            letter-spacing: 6px;
            margin-bottom: 25px;
            color: #ffffff;
            text-transform: uppercase;
        }

        .ending-text {
            font-size: 1.25rem;
            line-height: 1.8;
            color: #a0a0a0;
            margin-bottom: 60px;
            text-align: justify;
        }

        .logout-btn {
            display: inline-block;
            padding: 15px 40px;
            border: 1px solid #444;
            background: transparent;
            color: #fff;
            text-decoration: none;
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            transition: all 0.4s ease;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #ffffff;
            color: #000000;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <div class="cinematic-container">
        <h1 class="ending-title"><?php echo htmlspecialchars($currentEnding['title']); ?></h1>
        
        <img src="<?php echo htmlspecialchars($currentEnding['image']); ?>" alt="Conclusion" class="ending-image">
        
        <div class="ending-text">
            <?php echo nl2br(htmlspecialchars($currentEnding['text'])); ?>
        </div>
        
        <a href="logout.php" class="logout-btn">Terminate Connection</a>
    </div>

</body>
</html>
