<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Thank You</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script>
        function redirectToFeedback() {
            replaceElementWithURL("index.php", "body");
        }
        function redirectToHome() {
            var audio = document.getElementById("audio");
            audio.play();
        }
    </script>
</head>

<body>
    <audio id="audio" src="benny-hill.mp3"></audio>
    <div class="center">
        <h1 id="Thank-you">Thank you for your feedback</h1>
    </div>
    <button id="feedback" onclick="redirectToFeedback()">Feedback</button>
    <button id="home" onclick="redirectToHome()">Home</button>
</body>

</html>