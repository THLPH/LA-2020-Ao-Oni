<?php
// event_data.php

$events = [
    1 => [
        'img' => 'stray_bot.png',
        'text' => 'You find a broken security bot in the alley. It looks salvageable.',
        'choice1_text' => 'Harvest for parts',
        'choice1_rewards' => ['cred' => 15, 'emp' => -2],
        'choice2_text' => 'Repair its logic core',
        'choice2_rewards' => ['emp' => 3, 'def' => 1]
    ],
    2 => [
        'img' => 'mugger.png',
        'text' => 'A street thug demands your credits.',
        'choice1_text' => 'Fight him',
        'choice1_rewards' => ['atk' => 1, 'cred' => 5],
        'choice2_text' => 'Pay him off',
        'choice2_rewards' => ['cred' => -10]
    ],
    3 => [
        'img' => 'food_riot.png',
        'text' => 'A mob is looting a local noodle stand about 50 meters down the street.',
        'choice1_text' => 'Join the looters',
        'choice1_rewards' => ['cred' => 25, 'emp' => -5],
        'choice2_text' => 'Defend the vendor',
        'choice2_rewards' => ['emp' => 5, 'def' => 2]
    ],
    4 => [
        'img' => 'abandoned_term.png',
        'text' => 'You spot an abandoned corporate terminal with a weak firewall.',
        'choice1_text' => 'Siphon credits',
        'choice1_rewards' => ['cred' => 40, 'atk' => -1],
        'choice2_text' => 'Download combat routines',
        'choice2_rewards' => ['atk' => 3, 'emp' => -1]
    ],
    5 => [
        'img' => 'ripperdoc.png',
        'text' => 'A shady ripperdoc offers a free, experimental neural upgrade.',
        'choice1_text' => 'Accept the surgery',
        'choice1_rewards' => ['atk' => 5, 'emp' => -10],
        'choice2_text' => 'Decline politely',
        'choice2_rewards' => ['emp' => 2]
    ],
    6 => [
        'img' => 'lost_child.png',
        'text' => 'A crying child is wandering the smog-filled streets alone.',
        'choice1_text' => 'Ignore them',
        'choice1_rewards' => ['emp' => -3],
        'choice2_text' => 'Help them home',
        'choice2_rewards' => ['emp' => 8, 'cred' => -5]
    ],
    7 => [
        'img' => 'drone_crash.png',
        'text' => 'A heavy delivery drone weighing at least 100 kilograms crashed nearby.',
        'choice1_text' => 'Scavenge its payload',
        'choice1_rewards' => ['cred' => 50, 'emp' => -2],
        'choice2_text' => 'Strip its armor plating',
        'choice2_rewards' => ['def' => 4, 'cred' => 10]
    ],
    8 => [
        'img' => 'braindance.png',
        'text' => 'You find an illegal, highly addictive braindance chip.',
        'choice1_text' => 'Experience it',
        'choice1_rewards' => ['emp' => -8, 'def' => -2, 'atk' => 6],
        'choice2_text' => 'Crush it',
        'choice2_rewards' => ['emp' => 5]
    ],
    9 => [
        'img' => 'corrupt_cop.png',
        'text' => 'A corrupt syndicate officer stops you for a random "inspection".',
        'choice1_text' => 'Pay the bribe',
        'choice1_rewards' => ['cred' => -30],
        'choice2_text' => 'Intimidate them',
        'choice2_rewards' => ['atk' => 2, 'emp' => -4]
    ],
    10 => [
        'img' => 'neon_preacher.png',
        'text' => 'A cyborg preacher is screaming about the end of flesh.',
        'choice1_text' => 'Mock their beliefs',
        'choice1_rewards' => ['emp' => -5, 'atk' => 1],
        'choice2_text' => 'Listen and donate',
        'choice2_rewards' => ['cred' => -10, 'emp' => 6]
    ],
    11 => [
        'img' => 'gang_war.png',
        'text' => 'Two rival street gangs are having a shootout in the plaza.',
        'choice1_text' => 'Pick off the survivors',
        'choice1_rewards' => ['cred' => 60, 'emp' => -10],
        'choice2_text' => 'Take the long way around',
        'choice2_rewards' => ['def' => 1]
    ],
    12 => [
        'img' => 'hacker_cache.png',
        'text' => 'You discover a dead drop left by a notorious netrunner.',
        'choice1_text' => 'Steal the encrypted funds',
        'choice1_rewards' => ['cred' => 80],
        'choice2_text' => 'Install the defensive ICE',
        'choice2_rewards' => ['def' => 5]
    ],
    13 => [
        'img' => 'injured_merc.png',
        'text' => 'An injured mercenary is bleeding out in a doorway.',
        'choice1_text' => 'Steal their weapon',
        'choice1_rewards' => ['atk' => 6, 'emp' => -12],
        'choice2_text' => 'Apply a med-patch',
        'choice2_rewards' => ['emp' => 10, 'cred' => -15]
    ],
    14 => [
        'img' => 'fight_club.png',
        'text' => 'You stumble into an underground cyber-brawl.',
        'choice1_text' => 'Bet on the underdog',
        'choice1_rewards' => ['cred' => 50, 'emp' => -2],
        'choice2_text' => 'Study their fighting forms',
        'choice2_rewards' => ['atk' => 3, 'def' => 2]
    ],
    15 => [
        'img' => 'strange_vial.png',
        'text' => 'A fleeing thief drops a vial of glowing blue liquid.',
        'choice1_text' => 'Drink it',
        'choice1_rewards' => ['atk' => 8, 'def' => -3, 'emp' => -5],
        'choice2_text' => 'Sell it to a clinic',
        'choice2_rewards' => ['cred' => 45, 'emp' => 2]
    ],
    16 => [
        'img' => 'corp_recruiter.png',
        'text' => 'A slick corporate agent offers you a signing bonus to betray a friend.',
        'choice1_text' => 'Take the money',
        'choice1_rewards' => ['cred' => 150, 'emp' => -20],
        'choice2_text' => 'Tell them to rot',
        'choice2_rewards' => ['emp' => 8, 'def' => 2]
    ],
    17 => [
        'img' => 'rogue_taxi.png',
        'text' => 'An automated taxi with a broken locator chip offers a free ride.',
        'choice1_text' => 'Dismantle its engine',
        'choice1_rewards' => ['cred' => 35, 'atk' => 2, 'emp' => -4],
        'choice2_text' => 'Fix its navigation',
        'choice2_rewards' => ['emp' => 5]
    ],
    18 => [
        'img' => 'beggar.png',
        'text' => 'A veteran with missing cybernetic limbs asks for spare change.',
        'choice1_text' => 'Give them 20 credits',
        'choice1_rewards' => ['cred' => -20, 'emp' => 12],
        'choice2_text' => 'Tell them to get a job',
        'choice2_rewards' => ['emp' => -8]
    ],
    19 => [
        'img' => 'smuggler.png',
        'text' => 'A black market dealer offers you military-grade servo motors.',
        'choice1_text' => 'Buy them',
        'choice1_rewards' => ['cred' => -50, 'atk' => 5, 'def' => 5],
        'choice2_text' => 'Report them for a bounty',
        'choice2_rewards' => ['cred' => 40, 'emp' => -5]
    ],
    20 => [
        'img' => 'malfunction.png',
        'text' => 'A sudden EMP blast nearby scrambles your neural pathways.',
        'choice1_text' => 'Pay a clinic to fix it',
        'choice1_rewards' => ['cred' => -40, 'def' => 2],
        'choice2_text' => 'Tough it out',
        'choice2_rewards' => ['def' => -3, 'atk' => -2]
    ],
    21 => [
        'img' => 'cyber_dog.png',
        'text' => 'A mechanical stray dog follows you, whining for energy cells.',
        'choice1_text' => 'Feed it a cell',
        'choice1_rewards' => ['cred' => -10, 'emp' => 10],
        'choice2_text' => 'Kick it away',
        'choice2_rewards' => ['emp' => -15, 'atk' => 2]
    ],
    22 => [
        'img' => 'data_broker.png',
        'text' => 'A broker offers cold hard cash in exchange for your happiest memory.',
        'choice1_text' => 'Sell the memory',
        'choice1_rewards' => ['cred' => 100, 'emp' => -25],
        'choice2_text' => 'Keep your humanity',
        'choice2_rewards' => ['emp' => 5]
    ],
    23 => [
        'img' => 'vending_machine.png',
        'text' => 'A street corner ammo-vending machine is sparking and glitching.',
        'choice1_text' => 'Punch it open',
        'choice1_rewards' => ['atk' => 4, 'def' => -1, 'emp' => -2],
        'choice2_text' => 'Hack the service port',
        'choice2_rewards' => ['cred' => 25, 'emp' => 1]
    ],
    24 => [
        'img' => 'clinic.png',
        'text' => 'An underground clinic is desperate for synthetic blood donors.',
        'choice1_text' => 'Donate heavily',
        'choice1_rewards' => ['atk' => -3, 'emp' => 15, 'cred' => 20],
        'choice2_text' => 'Rob the medical cabinet',
        'choice2_rewards' => ['cred' => 70, 'emp' => -15]
    ],
    25 => [
        'img' => 'package.png',
        'text' => 'You find a ticking package addressed to a local gang boss.',
        'choice1_text' => 'Disarm and salvage the explosive',
        'choice1_rewards' => ['atk' => 7, 'emp' => -3],
        'choice2_text' => 'Throw it in the river',
        'choice2_rewards' => ['emp' => 5, 'def' => 2]
    ],
    26 => [
        'img' => 'protest.png',
        'text' => 'Anti-cybernetics zealots are blocking the road ahead.',
        'choice1_text' => 'Push through violently',
        'choice1_rewards' => ['atk' => 4, 'emp' => -10],
        'choice2_text' => 'Listen to their speech',
        'choice2_rewards' => ['emp' => 4, 'def' => 1]
    ],
    27 => [
        'img' => 'atm.png',
        'text' => 'An unencrypted banking terminal is spitting out physical cred-sticks.',
        'choice1_text' => 'Grab all you can carry',
        'choice1_rewards' => ['cred' => 120, 'emp' => -5],
        'choice2_text' => 'Analyze the security flaw',
        'choice2_rewards' => ['def' => 6]
    ],
    28 => [
        'img' => 'assassin.png',
        'text' => 'A wounded corporate assassin asks you to hide them from security.',
        'choice1_text' => 'Sell them out',
        'choice1_rewards' => ['cred' => 100, 'emp' => -10],
        'choice2_text' => 'Hide them',
        'choice2_rewards' => ['atk' => 6, 'emp' => 5]
    ],
    29 => [
        'img' => 'relic.png',
        'text' => 'You unearth an old-world paper book buried in the toxic mud.',
        'choice1_text' => 'Sell it to an antiquities dealer',
        'choice1_rewards' => ['cred' => 85, 'emp' => -2],
        'choice2_text' => 'Read it',
        'choice2_rewards' => ['emp' => 15, 'def' => 2]
    ],
    30 => [
        'img' => 'beggar.png',
        'text' => 'The city is eerily quiet. Tomorrow is the final showdown.',
        'choice1_text' => 'Meditate and prepare',
        'choice1_rewards' => ['emp' => 10, 'def' => 5],
        'choice2_text' => 'Run one last hustle',
        'choice2_rewards' => ['cred' => 60, 'atk' => 5, 'emp' => -5]
    ]
];
?>