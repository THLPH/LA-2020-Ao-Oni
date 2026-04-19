<?php
require_once 'init.php';
require_once 'shop_data.php';

// --- PROCESSOR LOGIC ---

// Handle Weapon Purchases
if (isset($_GET['buy_wep'])) {
    $item_id = (int)$_GET['buy_wep']; 
    
    if (isset($weapons[$item_id]) && $item_id > $wep) {
        $new_cost = $weapons[$item_id]['cost'];
        // Calculate 95% refund of current weapon (if any)
        $trade_in_value = ($wep > 0) ? floor($weapons[$wep]['cost'] * 0.95) : 0;
        
        // Check if player can afford it with the trade-in credit
        if (($cred + $trade_in_value) >= $new_cost) {
            $cred = ($cred + $trade_in_value) - $new_cost; // Apply trade-in and deduct
            $wep = $item_id; 
        }
    }
    header("Location: shop.php");
    exit();
}

// Handle Cybernetic Purchases
if (isset($_GET['buy_cyb'])) {
    $item_id = (int)$_GET['buy_cyb'];
    
    if (isset($cybernetics[$item_id]) && $item_id > $cyb) {
        $new_cost = $cybernetics[$item_id]['cost'];
        $trade_in_value = ($cyb > 0) ? floor($cybernetics[$cyb]['cost'] * 0.95) : 0;
        
        if (($cred + $trade_in_value) >= $new_cost) {
            $cred = ($cred + $trade_in_value) - $new_cost;
            $cyb = $item_id; 
        }
    }
    header("Location: shop.php");
    exit();
}

// Shopkeeper dialog
// Old: Welcome to the market, operator. Upgrade your hardware. I'll buy your old gear for 95% of what you paid for them. Weapons and Cybernetics hold their value these days

$shop_dialogue = "";

if ($emp >= 60) {
    $shop_dialogue = "You've got that look in your eyes, operator. Like you actually give a damn. Well, 'caring' doesn't stop bullets, but my hardware does. 95% buyback on your old gear if you're looking to trade up.";
} elseif ($emp >= 0) {
    $shop_dialogue = "Welcome back. Same deal as always: I'll buy your old gear for 95% of what you paid. Weapons and cybernetics are the only things that hold their value in this dump.";
} elseif ($emp >= -15) {
    $shop_dialogue = "You're looking sharp, operator. Or maybe just cold. Either way, business is business. 95% trade-in value on your current kit. What's your pleasure?";
} else {
    $shop_dialogue = "I don't ask questions, and I don't care who you flatlined to get here. Just keep the blood off the floor. 95% buyback on used tech. Let's see your credits.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRUST GLOBAL - BLACK MARKET</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="hub-body" style="background-image: url('assets/shop/shop_bg.png');">

    <div class="terminal-container shop-mode">
        
        <div class="header-cell">
            <span>>>>> BLACK_MARKET</span>
            <span>[ BAL: <?php echo $cred; ?> ƕ ]</span>
        </div>
        
        <div class="content-cell">
            
            <div class="vendor-header">
                <div class="vendor-portrait">
                    <img src="assets/shop/shopkeeper.png" alt="Shopkeeper">
                </div>
                <div>
                    <span class="sys-text" style="margin-bottom: 8px;">>>>> VENDOR NODE ACCESSED...</span>
                    <div class="vendor-dialogue">
                        "<?php echo $shop_dialogue; ?>"
                    </div>
                </div>
            </div>
            
            <div class="shop-layout">
                
                <div class="shop-column">
                    <div class="stats-panel">
                        <span class="sys-text">>> HARDWARE // WEAPONRY</span>
                        
                        <?php 
                        $cur_wep_val = ($wep > 0) ? floor($weapons[$wep]['cost'] * 0.95) : 0;
                        foreach ($weapons as $id => $item): 
                            if ($id > $wep): 
                                $effective_price = $item['cost'] - $cur_wep_val;
                        ?>
                                <div class="shop-item-row">
                                    <span><?php echo $item['name']; ?><br>[+<?php echo $item['atk_bonus']; ?> ATK]</span>
                                    <div class="item-details">
                                        <span><?php echo $item['cost']; ?>ƕ<br><span class="trade-in-note">NET: <?php echo $effective_price; ?>ƕ</span></span>
                                        <?php if (($cred + $cur_wep_val) >= $item['cost']): ?>
                                            <a href="shop.php?buy_wep=<?php echo $id; ?>" class="buy-btn-mini">BUY</a>
                                        <?php else: ?>
                                            <span class="status-locked">LOCKED</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="shop-column">
                    <div class="stats-panel">
                        <span class="sys-text">>> HARDWARE // CYBERNETICS</span>
                        
                        <?php 
                        $cur_cyb_val = ($cyb > 0) ? floor($cybernetics[$cyb]['cost'] * 0.95) : 0;
                        foreach ($cybernetics as $id => $item): 
                            if ($id > $cyb): 
                                $effective_price = $item['cost'] - $cur_cyb_val;
                        ?>
                                <div class="shop-item-row">
                                    <span><?php echo $item['name']; ?><br>[+<?php echo $item['def_bonus']; ?> DEF]</span>
                                    <div class="item-details">
                                        <span><?php echo $item['cost']; ?>ƕ<br><span class="trade-in-note">NET: <?php echo $effective_price; ?>ƕ</span></span>
                                        <?php if (($cred + $cur_cyb_val) >= $item['cost']): ?>
                                            <a href="shop.php?buy_cyb=<?php echo $id; ?>" class="buy-btn-mini">BUY</a>
                                        <?php else: ?>
                                            <span class="status-locked">LOCKED</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <div class="shop-footer action-menu">
                <a href="index.php" class="action-btn">>>>> CLOSE LINK</a>
            </div>
            
        </div>
    </div>

</body>
</html>