<?php
// visits.php - receives user behavior data via POST and stores in user_behavior.csv

$behaviorFile = __DIR__ . '/data/user_behavior.csv';

// Only accept POST requests with JSON
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    if ($data && isset($data['user_id'], $data['actions']) && is_array($data['actions'])) {
        $maxSize = 10 * 1024 * 1024; // 10 MB
        if (file_exists($behaviorFile) && filesize($behaviorFile) > $maxSize) {
            $i = 1;
            do {
                $archiveFile = __DIR__ . '/data/user_behavior_' . $i . '.csv';
                $i++;
            } while (file_exists($archiveFile));
            rename($behaviorFile, $archiveFile);
            // Recreate the file with header
            file_put_contents($behaviorFile, "UserID,Event,Timestamp,Details\n");
        }
        foreach ($data['actions'] as $action) {
            if (isset($action['event'], $action['timestamp'], $action['details'])) {
                $row = [
                    $data['user_id'],
                    $action['event'],
                    $action['timestamp'],
                    str_replace(["\r", "\n", '"'], [' ', ' ', "'"], $action['details'])
                ];
                file_put_contents($behaviorFile, implode(',', $row) . "\n", FILE_APPEND);
            }
        }
        http_response_code(200);
        echo json_encode(['status' => 'ok']);
        exit;
    }
}
http_response_code(400);
echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
