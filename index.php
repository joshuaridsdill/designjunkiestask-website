<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="src/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <form id="contactForm" action="php/submit.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="telephone">Telephone:</label>
        <input type="tel" id="telephone" name="telephone" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
        <div class="g-recaptcha" data-sitekey="6LcsHMApAAAAAK_fw3mh0DvVYFfERh16weQksMXi"></div><br>
        <input type="submit" value="Submit">
    </form>

    <div class="csv-container">
        <h1>Download CSV</h1>
        <p>Click the button below to download the CSV file:</p>
        <a href="php/export.php" download>
            <button>Download CSV</button>
        </a>
    </div>

    <div id="customAlert" class="hidden"></div>

    <script src="src/script.js"></script>
</body>

</html>