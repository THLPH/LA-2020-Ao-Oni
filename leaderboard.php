<?php
session_start();

$leaderboard_file = 'leaderboard.txt';
$records = [];

if (file_exists($leaderboard_file)) {
    $lines = file($leaderboard_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $data = json_decode($line, true);
        if ($data) {
            $records[] = $data;
        }
    }
}

// SORTING LOGIC: Ending (Asc), Class (Asc), Power (Desc), Credits (Desc), Empathy (Desc)
usort($records, function($a, $b) {
    if ($a['ending'] != $b['ending']) {
        return $a['ending'] <=> $b['ending']; // ASC
    }
    $classA = $a['class'] ?? '';
    $classB = $b['class'] ?? '';
    if ($classA != $classB) {
        return strcmp($classA, $classB); // ASC
    }
    if ($a['power'] != $b['power']) {
        return $b['power'] <=> $a['power']; // DESC
    }
    if ($a['credits'] != $b['credits']) {
        return $b['credits'] <=> $a['credits']; // DESC
    }
    return $b['empathy'] <=> $a['empathy']; // DESC
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRUST GLOBAL - HALL OF FAME</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .leaderboard-table th, .leaderboard-table td {
            padding: 12px 5px; /* Slightly tighter padding for more columns */
        }
        .scrollable-table-container {
            max-height: 60vh;
        }
    </style>
</head>
<body class="hub-body">

    <div class="terminal-container hub-mode">
        <div class="header-cell">
            <span>>>>> HALL_OF_FAME</span>
            <span>[ ARCHIVE ]</span>
        </div>
        
        <div class="content-cell">
            <span class="sys-text">>>>> RETRIEVING OPERATIVE RECORDS...</span>

            <div class="scrollable-table-container">
                <table class="leaderboard-table">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Operative</th>
                            <th>Class</th>
                            <th>End</th>
                            <th>Power</th>
                            <th>Cred</th>
                            <th>Emp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($records)): ?>
                            <tr>
                                <td colspan="7" style="text-align: center; font-style: italic;">No records found.</td>
                            </tr>
                        <?php else: ?>
                            <?php 
                            $rank = 1;
                            foreach ($records as $record): 
                                $is_current_user = (isset($_SESSION['username']) && $_SESSION['username'] === $record['name']);
                                $row_class = $is_current_user ? 'highlight-row' : '';
                            ?>
                                <tr class="<?php echo $row_class; ?>">
                                    <td class="rank-col">#<?php echo $rank++; ?></td>
                                    <td><?php echo htmlspecialchars($record['name']); ?></td>
                                    <td><?php echo htmlspecialchars($record['class'] ?? '???'); ?></td>
                                    <td><?php echo (int)$record['ending']; ?></td>
                                    <td><?php echo number_format((float)$record['power'], 0); ?></td>
                                    <td><?php echo number_format((int)$record['credits']); ?></td>
                                    <td><?php echo (int)($record['empathy'] ?? 0); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
            <div class="action-menu">
                <a href="index.php" class="action-btn">Return to Terminal</a>
            </div>
        </div>
    </div>
</body>
</html>