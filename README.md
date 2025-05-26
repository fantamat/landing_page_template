# PHP Landing Page with Visitor and Behavior Tracking

This project is a simple PHP landing page that:
- Collects visitor information (IP, user agent, language, bot detection, and a unique user ID)
- Allows users to submit their email address via a form
- Tracks user behavior (page loads, clicks, scrolls) in the browser and sends it to the server in batches
- Stores all data in CSV files inside a protected `data` directory

## Features
- **Visitor Logging:** Each visit is logged with timestamp, IP, user agent, language, bot detection, and a unique user reference (stored in a cookie).
- **Email Collection:** Users can subscribe with their email, which is validated and stored separately.
- **User Behavior Tracking:** JavaScript monitors user actions for 5 seconds, then sends a batch of actions to the server for logging.
- **CSV File Rotation:** When a CSV file exceeds 10MB, it is automatically archived and a new file is started.
- **Security:** The `data` directory is protected from direct web access using `.htaccess`.

## File Structure
```
index.php           # Main landing page (handles visits and email form)
visits.php          # Endpoint for receiving user behavior data (AJAX)
data/
  visits.csv        # Visitor logs (rotated as visits_N.csv)
  emails.csv        # Collected emails
  user_behavior.csv # User behavior logs (rotated as user_behavior_N.csv)
  .htaccess         # Denies all web access to this directory
```

## How to Run
1. Make sure you have PHP installed.
2. Start the PHP built-in server from the project directory:
   ```
   php -S localhost:8000
   ```
3. Open your browser and go to [http://localhost:8000/index.php](http://localhost:8000/index.php)

## Security Notes
- The `data` directory is protected by `.htaccess` and is not accessible via the web (when using Apache). The PHP built-in server does not process `.htaccess`, so do not use it for production.
- All sensitive data is stored in the `data` directory, which is only accessible by the PHP scripts.

## Customization
- Edit `index.php` to change the landing page content, add more tracking, or adjust the form.
- Adjust the CSV file size limit or rotation logic as needed.

## License
This project is provided as-is for educational and demonstration purposes.
