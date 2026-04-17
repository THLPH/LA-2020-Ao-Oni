<?php
// work_data.php

$jobs = [
    1 => [
        'title' => 'Scrap Sorting',
        'img' => 'scrap_yard.png',
        'text' => 'A local mechanic needs someone to sort through 500 kilograms of rusted cybernetics. It pays 30 credits.',
        'accept_text' => 'Build some physical resilience hauling heavy metal.',
        'decline_text' => 'My spine is not built for manual labor.',
        'rewards' => ['cred' => 30, 'def' => 1]
    ],
    2 => [
        'title' => 'Data Courier',
        'img' => 'courier.png',
        'text' => 'Transport an encrypted hard drive 5 kilometers across the sector. You are strictly forbidden from asking what is on it.',
        'accept_text' => 'Take the package for a quick 45 credits.',
        'decline_text' => 'Corporate secrets get couriers flatlined.',
        'rewards' => ['cred' => 45]
    ],
    3 => [
        'title' => 'Security Detail',
        'img' => 'club_door.png',
        'text' => 'Stand outside a neon-lit nightclub and keep the rabble out. They are offering 50 credits.',
        'accept_text' => 'Crack some skulls. It hardens your edge but numbs your soul.',
        'decline_text' => 'I am not a bouncer for synth-junkies.',
        'rewards' => ['cred' => 50, 'atk' => 1, 'emp' => -2]
    ],
    4 => [
        'title' => 'Clinic Assistant',
        'img' => 'clinic_work.png',
        'text' => "A quiet researcher is running an unlicensed clinic. She needs help holding down patients during unanesthetized cyber-surgery. She doesn't talk much.",
        'accept_text' => "Comfort the screaming patients. It reminds you that you're still human.",
        'decline_text' => 'I am not here to play nurse for a researcher.',
        'rewards' => ['cred' => 40, 'emp' => 2]
    ],
    5 => [
        'title' => 'Bio-Waste Disposal',
        'img' => 'hazmat.png',
        'text' => 'A local lab needs 200 liters of corrosive runoff dumped in the sewers for 60 credits.',
        'accept_text' => 'Expose yourself to the fumes. Your immune system will adapt.',
        'decline_text' => 'I am not melting my lungs for pocket change.',
        'rewards' => ['cred' => 60, 'def' => 2]
    ],
    6 => [
        'title' => 'Smuggler Escort',
        'img' => 'smuggler_run.png',
        'text' => 'A shady dealer needs muscle to walk a shipment of illegal optics through gang territory. The payout is 80 credits.',
        'accept_text' => 'Keep your hand on your weapon. Good practice for a firefight.',
        'decline_text' => 'Too much heat for a simple walk.',
        'rewards' => ['cred' => 80, 'atk' => 2, 'emp' => -1]
    ],
    7 => [
        'title' => 'Corporate Espionage',
        'img' => 'corp_tail.png',
        'text' => 'Follow a mid-level executive for 10 kilometers and record their meetings. Quiet work for 50 credits.',
        'accept_text' => 'Stay in the shadows and collect the pay.',
        'decline_text' => 'I do not like playing stalker.',
        'rewards' => ['cred' => 50]
    ],
    8 => [
        'title' => 'Chop Shop Labor',
        'img' => 'chop_shop.png',
        'text' => 'A syndicate garage needs help stripping parts off stolen security mechs. They pay 90 credits.',
        'accept_text' => 'Learn how to tear armor apart, even if it feels wrong.',
        'decline_text' => 'I will not get involved with syndicate thieves.',
        'rewards' => ['cred' => 90, 'atk' => 2, 'emp' => -3]
    ],
    9 => [
        'title' => 'Virtual Bodyguard',
        'img' => 'braindance_guard.png',
        'text' => 'Jack into a braindance server and shield a client from digital assault. The gig pays 70 credits.',
        'accept_text' => 'Endure the digital feedback. It thickens your mental shielding.',
        'decline_text' => 'My brain is not a punching bag.',
        'rewards' => ['cred' => 70, 'def' => 2]
    ],
    10 => [
        'title' => 'Decoy',
        'img' => 'decoy_run.png',
        'text' => 'A local hacker needs you to distract law enforcement by causing a public panic. 100 credits if you get away.',
        'accept_text' => 'Cause chaos and practice your offensive strikes.',
        'decline_text' => 'I am not going to a corporate prison for a hacker.',
        'rewards' => ['cred' => 100, 'atk' => 3, 'emp' => -4]
    ],
    11 => [
        'title' => 'Data Translation',
        'img' => 'data_entry.png',
        'text' => 'Sit in a cramped booth and manually decrypt corrupted audio files for 40 credits.',
        'accept_text' => 'Boring, but it is safe money.',
        'decline_text' => 'I would rather starve than do data entry.',
        'rewards' => ['cred' => 40]
    ],
    12 => [
        'title' => 'Debt Collection',
        'img' => 'broken_fingers.png',
        'text' => 'A loan shark wants you to collect from a struggling family. Break things if you have to. 150 credits.',
        'accept_text' => 'Break their bones. The money is worth the guilt.',
        'decline_text' => 'I refuse to terrorize desperate people.',
        'rewards' => ['cred' => 150, 'atk' => 4, 'emp' => -10]
    ],
    13 => [
        'title' => 'Soup Kitchen Guard',
        'img' => 'soup_kitchen.png',
        'text' => 'Protect a charity food line from desperate rioters. They can only afford to pay you 20 credits.',
        'accept_text' => 'Stand your ground for the helpless. It clears your conscience.',
        'decline_text' => 'Charity does not buy weapon upgrades.',
        'rewards' => ['cred' => 20, 'def' => 2, 'emp' => 5]
    ],
    14 => [
        'title' => 'Volatile Transport',
        'img' => 'chem_barrel.png',
        'text' => 'Carry a 15 kilogram container of unstable explosives across the slums for 110 credits.',
        'accept_text' => 'Learn how to handle dangerous goods without flinching.',
        'decline_text' => 'One bad step and I am vaporized.',
        'rewards' => ['cred' => 110, 'atk' => 2]
    ],
    15 => [
        'title' => 'Cybernetics Tester',
        'img' => 'surgery_chair.png',
        'text' => 'A ripperdoc wants to test a highly painful pain-inhibitor chip on you. 180 credits for your suffering.',
        'accept_text' => 'Endure the agony to build a higher pain tolerance.',
        'decline_text' => 'I am not a lab rat.',
        'rewards' => ['cred' => 180, 'def' => 4, 'emp' => -5]
    ],
    16 => [
        'title' => 'Graffiti Removal',
        'img' => 'scrubber.png',
        'text' => 'The city is paying 50 credits to anyone willing to scrub syndicate tags off the main plaza walls.',
        'accept_text' => 'Grab a brush and earn a quiet living.',
        'decline_text' => 'That just makes me a target for the gangs.',
        'rewards' => ['cred' => 50]
    ],
    17 => [
        'title' => 'Pit Fighter',
        'img' => 'fight_pit.png',
        'text' => 'Survive three rounds in an underground bare-knuckle arena for 120 credits.',
        'accept_text' => 'Bleed for the crowd and sharpen your combat instincts.',
        'decline_text' => 'I only fight when it matters.',
        'rewards' => ['cred' => 120, 'atk' => 3, 'emp' => -2]
    ],
    18 => [
        'title' => 'Sludge Diving',
        'img' => 'toxic_pool.png',
        'text' => 'Retrieve a lost data-core from a toxic cooling pond. 90 credits for the hazard.',
        'accept_text' => 'Wading through toxins builds physical endurance.',
        'decline_text' => 'I will smell like battery acid for weeks.',
        'rewards' => ['cred' => 90, 'def' => 3]
    ],
    19 => [
        'title' => 'Identity Forger',
        'img' => 'fake_id.png',
        'text' => 'Help a group of synthetic refugees forge new travel papers. 60 credits is all they have.',
        'accept_text' => 'Help them escape the city. It is the right thing to do.',
        'decline_text' => 'Forging papers gets you thrown in the corporate black-sites.',
        'rewards' => ['cred' => 60, 'emp' => 4]
    ],
    20 => [
        'title' => 'Factory Sabotage',
        'img' => 'sparking_wire.png',
        'text' => 'A rival corp wants you to smash the assembly line at a local factory. 200 credits for massive property damage.',
        'accept_text' => 'Destroying machines teaches you how to break them faster.',
        'decline_text' => 'Honest workers will lose their jobs over this.',
        'rewards' => ['cred' => 200, 'atk' => 4, 'emp' => -8]
    ],
    21 => [
        'title' => 'Heavy Hauling',
        'img' => 'crate_push.png',
        'text' => 'Drag a pallet of server racks weighing 300 kilograms across a warehouse for 70 credits.',
        'accept_text' => 'Straining your servos makes them stronger.',
        'decline_text' => 'Get a cargo drone to do it.',
        'rewards' => ['cred' => 70, 'def' => 2]
    ],
    22 => [
        'title' => 'Bounty Bait',
        'img' => 'crosshair.png',
        'text' => 'A bounty hunter needs you to wear a target tracker and run through the slums to draw out a sniper. 150 credits.',
        'accept_text' => 'Dodging bullets is the best way to practice survival.',
        'decline_text' => 'I am not getting my head blown off for a distraction.',
        'rewards' => ['cred' => 150, 'def' => 4]
    ],
    23 => [
        'title' => 'Cleanup Crew',
        'img' => 'blood_mop.png',
        'text' => 'A syndicate hit squad made a mess of a penthouse. They are offering 180 credits if you mop it up before the cops arrive.',
        'accept_text' => 'The money is good, even if the smell of death ruins your empathy.',
        'decline_text' => 'I am not an accomplice to murder.',
        'rewards' => ['cred' => 180, 'emp' => -10]
    ],
    24 => [
        'title' => 'Whistleblower Escort',
        'img' => 'whistle_researcher.png',
        'text' => "A medical researcher needs an armed escort to the sector border. She's carrying dirty laundry from TRUST Pharmaceutical.",
        'accept_text' => 'Keep her safe. The long march builds defensive stamina.',
        'decline_text' => 'Corporate assassins will be all over her soon.',
        'rewards' => ['cred' => 100, 'def' => 2, 'emp' => 4]
    ],
    25 => [
        'title' => 'Hostile Extraction',
        'img' => 'breach_door.png',
        'text' => 'Kick the door in on a rival gang hideout and drag a hostage out. 220 credits.',
        'accept_text' => 'Violent, aggressive, and highly lucrative.',
        'decline_text' => 'I am not starting a gang war today.',
        'rewards' => ['cred' => 220, 'atk' => 5, 'emp' => -5]
    ],
    26 => [
        'title' => 'Grid Repair',
        'img' => 'power_box.png',
        'text' => 'The slums have lost power. The locals scraped together 40 credits to pay someone to fix the high-voltage relay.',
        'accept_text' => 'Restore the lights for the people. It warms the heart.',
        'decline_text' => 'Let the city maintenance crews handle it.',
        'rewards' => ['cred' => 40, 'emp' => 5]
    ],
    27 => [
        'title' => 'Train Heist',
        'img' => 'mag_train.png',
        'text' => 'Jump onto a moving corporate mag-train and steal raw lithium crates. Massive payout of 300 credits.',
        'accept_text' => 'Push your combat limits for a massive payday.',
        'decline_text' => 'One slip and I am paste on the tracks.',
        'rewards' => ['cred' => 300, 'atk' => 6, 'emp' => -12]
    ],
    28 => [
        'title' => 'Body Recovery',
        'img' => 'body_bag.png',
        'text' => 'A grieving mother will pay 100 credits if you go into the combat zone and drag her son\'s body back.',
        'accept_text' => 'Haul the tragic weight through a warzone. It hardens your defenses.',
        'decline_text' => 'The dead should stay where they fall.',
        'rewards' => ['cred' => 100, 'def' => 3, 'emp' => 2]
    ],
    29 => [
        'title' => 'Sniper Overwatch',
        'img' => 'sniper_scope.png',
        'text' => 'Provide covering fire for a professional assassin. 400 credits to pull the trigger on anyone who interferes.',
        'accept_text' => 'Watch the life leave their eyes through a scope. It pays incredibly well.',
        'decline_text' => 'I am not a cold-blooded killer for hire.',
        'rewards' => ['cred' => 400, 'atk' => 8, 'emp' => -20]
    ],
    30 => [
        'title' => 'Final Diagnostics',
        'img' => 'wire_jack.png',
        'text' => 'No one is hiring today. You can spend the day running painful recalibrations on your own nervous system.',
        'accept_text' => 'Push your synthetic body to the absolute limit. Prepare for tomorrow.',
        'decline_text' => 'I need to rest my mind.',
        'rewards' => ['def' => 5, 'atk' => 5, 'emp' => -2]
    ]
];
?>