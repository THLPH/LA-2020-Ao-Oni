<?php
session_start();

// Fallback to Ending 1 if the session isn't set properly
$endingID = $_SESSION['ending'] ?? 1;

// The Ending Data Library
$endings = [
    1 => [
        "title" => "Contract Expired",
        "image" => "assets/ending1.jpg",
        "text" => "The contract expired, the target is still alive. TRUST Global does not tolerate delays or loose ends. Your cheap apartment's door flung open before all the displays flashed red. Maybe...you should try doing your job next time?"
    ],
    2 => [
        "title" => "Knight in Neon Armor",
        "image" => "assets/ending2.jpg",
        "text" => "You stood victorious but chose to lower your blade. Recognizing your mercy, she repaid the debt by cleaning up the hitman sent after you. She vanished into the neon rain. But with a failed contract and a dead cleanup crew, are you truly free?"
    ],
    3 => [
        "title" => "Employee of the Day",
        "image" => "assets/ending3.jpg",
        "text" => "The target was eliminated with a single slash. She never stood a chance against you, oh great hero. Your promotion cleared, and the bounty was wired to your account. You never learned her name or the stories she wanted to tell, and TRUST Global prefers it that way. Please check your terminal for your next assignment."
    ],
    4 => [
        "title" => "End of a Life",
        "image" => "assets/ending4.jpg",
        "text" => "Your strength pales in comparison to the Legend of the Walled City, but she didn't leave you to fade alone. As the construction site loomed in the distant sunset, she gently leaned you against the shoji screens. Her voice, low and calm, began to tell a story. Not of this fight, but of an ancient city and its forgotten people. A strange sense of peace settled over you. The roar of the excavators became a rhythmic lullaby, and the passage of time melted into the orange sky. Your lifeless body listened to the cadence of the woman's story until the words drifted into a soft, indistinct hum. You are just another ghost in this decaying city. Maybe try buying better gear next time?"
    ],
    5 => [
        "title" => "Here in Vernal Terrene",
        "image" => "assets/ending5.jpg",
        "text" => "You approached the demon completely unarmed, offering nothing but a blood-stained relic from a forgotten era. Seeing your vulnerability, the Ogre lowered her blade. For the first time in three decades, the cycle of violence broke over a simple, quiet meal. For once, nobody is paying for your time. For once, in this city, you're just a person having dinner. And for once, you feel like your companion is actually listening. Sometimes, it isn't about saving the world, it's about saving yourself. Happy Ending? Wrong city, wrong people. But for now, enjoy what you have. Many would kill for it."
    ]
];

// Select the specific ending data
$currentEnding = $endings[$endingID];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Game Over</title>
    </head>
<body>


</body>
</html>
