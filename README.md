> [!IMPORTANT]
> MySQL Commands
```
CREATE TABLE IF NOT EXISTS form_submissions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  telephone VARCHAR(20),
  email VARCHAR(255),
  message TEXT,
  ip VARCHAR(45),
  browser VARCHAR(255),
  priority_status ENUM('SAME_DAY', 'MORNING_REPLY', 'DEFAULT'),
  submission_status ENUM('POSSIBLE_SPAM', 'SPAM', 'DEFAULT', 'POSSIBLE_TEXT_SPAM'),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

> [!IMPORTANT]
> Project Instructions
+ Install Xampp and place the project in ```C:\xampp\htdocs\```.
+ After that Start up the server and go to ```localhost``` on your browser.

**Now you should be good to go** :+1:

> [!TIP]
> For any inconveniences or problems please contact my email ```joshuaridsdill@outlook.com```
