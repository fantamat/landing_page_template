<?php
// landing_page.php
// Collect visitor info and handle email form submission

$visitsFile = __DIR__ . '/data/visits.csv';
$emailsFile = __DIR__ . '/data/emails.csv';

// Collect visit info
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'unknown';
$visitTime = date('Y-m-d H:i:s');

// Try to detect bots
$isBot = false;
$botKeywords = ['bot', 'crawl', 'spider', 'slurp', 'curl', 'wget', 'python-requests', 'httpclient', 'fetch', 'scrapy'];
foreach ($botKeywords as $keyword) {
    if (stripos($userAgent, $keyword) !== false) {
        $isBot = true;
        break;
    }
}

// Save visit info to visits.csv
$maxSize = 10 * 1024 * 1024; // 10 MB
if (file_exists($visitsFile) && filesize($visitsFile) > $maxSize) {
    $i = 1;
    do {
        $archiveFile = __DIR__ . '/data/visits_' . $i . '.csv';
        $i++;
    } while (file_exists($archiveFile));
    rename($visitsFile, $archiveFile);
    // Recreate the file with header
    file_put_contents($visitsFile, "UserID,Date,IP,UserAgent,Language,IsBot\n");
}
$visitData = [$visitTime, $ip, $userAgent, $language, $isBot ? 'yes' : 'no'];
// Get user_ref from cookie if present
$userRef = null;
if (isset($_COOKIE['user_ref'])) {
    $userRef = $_COOKIE['user_ref'];
} else {
    // fallback: generate a random one (should match JS logic)
    $userRef = 'u_' . substr(md5(uniqid('', true)), 0, 12);
}
array_unshift($visitData, $userRef);
file_put_contents($visitsFile, implode(',', $visitData) . "\n", FILE_APPEND);

// Handle email form submission
$emailMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = trim($_POST['email']);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Save email to emails.csv
        if (!file_exists($emailsFile)) {
            file_put_contents($emailsFile, "Date,IP,Email\n");
        }
        $emailData = [$visitTime, $ip, $email];
        file_put_contents($emailsFile, implode(',', $emailData) . "\n", FILE_APPEND);
        $emailMessage = '<p style="color:green;">Thank you for subscribing!</p>';
    } else {
        $emailMessage = '<p style="color:red;">Invalid email address.</p>';
    }
}
?>

<?php
// Detect language from cookie or Accept-Language header
$lang = 'en';
if (isset($_COOKIE['lang']) && in_array($_COOKIE['lang'], ['en', 'cs'])) {
    $lang = $_COOKIE['lang'];
} elseif (preg_match('/\bcs\b/i', $language)) {
    $lang = 'cs';
}

// Load the appropriate php file
$phpFile = __DIR__ . "/$lang.php";
if (!file_exists($phpFile)) {
    $phpFile = __DIR__ . '/en.php'; // Fallback to English if the specified file doesn't exist
}

include $phpFile;
?>