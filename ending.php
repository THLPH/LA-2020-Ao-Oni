<?php
require_once 'init.php';

// The Ending Data Library
$ending_id = [
    1 => [
        "title" => "Contract Expired",
        "image" => "assets/ending/ending1.png",
        "text" => "The contract expired, the target is still alive. TRUST Global does not tolerate delays or loose ends.\nYour cheap apartment's door flung open as all your tech get disabled.\nMaybe...you should try doing your job next time? Just a thought."
    ],
    2 => [
        "title" => "Knight in Neon Armor",
        "image" => "assets/ending/ending2.png",
        "text" => "You stood victorious but chose to lower your blade. Recognizing your mercy, she repayed the debt by cleaning up the hitman sent after you.\nShe walked away and vanished into the rainy neon city.\nBut with a failed contract and a dead cleanup crew, are you truly free?"
    ],
    3 => [
        "title" => "Employee of the Day",
        "image" => "assets/ending/ending3.png",
        "text" => "The target was eliminated with a single slash. She never stood a chance against you, oh great hero.\nYour promotion cleared, and the bounty was wired to your account. You won't have to worry about rent or food for the next whole 3 days. Most people would kill for that kind of luxury.\nYou never learned her name or the stories she wanted to tell, and TRUST Global prefers it that way.\nPlease check your terminal for your next assignment."
    ],
    4 => [
        "title" => "End of a Life",
        "image" => "assets/ending/ending4.png",
        "text" => "Your strength pales in comparison to the Legend of the Walled City, but she didn't leave you to fade alone. As the construction site loomed in the distant sunset, she gently leaned you against the shoji screens.\nHer voice, low and calm, began to tell a story. Not of this fight, but of an ancient city and its forgotten people. A strange sense of peace settled over you.\nThe roar of the excavators became a rhythmic lullaby, and the passage of time melted into the orange sky. Your lifeless body listened to the cadence of the woman's story until the words drifted into a soft, indistinct hum.\nYou are just another ghost in this decaying city. Maybe try buying better gear next time?"
    ],
    5 => [
        "title" => "Here in Vernal Terrene",
        "image" => "assets/ending/ending5.png",
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
    <link rel="stylesheet" href="styles.css">
</head>
<body class="ending-body">

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