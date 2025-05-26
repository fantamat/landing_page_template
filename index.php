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

// INSERT YOUR HTML CODE BELOW
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 400px; margin: 80px auto; background: #fff; padding: 32px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #333; }
        form { display: flex; flex-direction: column; gap: 12px; }
        input[type="email"] { padding: 10px; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px; background: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
        hr { border: 0; height: 1px; background: #ddd; margin: 32px 0; }
        section { margin-top: 24px; }
        blockquote { font-style: italic; color: #555; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome!</h1>
        <p>Subscribe to our newsletter:</p>
        <?php echo $emailMessage; ?>
        <form method="post" action="">
            <input type="email" name="email" placeholder="Enter your email" required />
            <button type="submit">Subscribe</button>
        </form>
        <hr>
        <section>
            <h2>Why Choose Us?</h2>
            <ul>
                <li>Fast and reliable service</li>
                <li>Trusted by thousands of users</li>
                <li>24/7 customer support</li>
            </ul>
        </section>
        <section>
            <h2>Testimonials</h2>
            <blockquote>"This service changed my life!" – Alex</blockquote>
            <blockquote>"Highly recommended for everyone." – Jamie</blockquote>
        </section>
        <section>
            <h2>Our Features</h2>
            <div style="display: flex; flex-direction: column; gap: 8px;">
                <div><strong>Easy to Use:</strong> Simple and intuitive interface.</div>
                <div><strong>Secure:</strong> Your data is protected with us.</div>
                <div><strong>Regular Updates:</strong> We keep improving for you.</div>
            </div>
        </section>
    </div>
    <script src="public/js/behavior.js"></script>
</body>
</html>
