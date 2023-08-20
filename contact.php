<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "gak.gak@hotmail.com"; // Replace with the recipient's email address
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $headers = "From: " . "gak.gak.gak@gmail.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Email sending failed.". error_get_last();
    }
}
?>

<h2>Contact Us</h2>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="email">Your Email:</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="subject">Subject:</label><br>
    <input type="text" id="subject" name="subject" required><br>

    <label for="message">Message:</label><br>
    <textarea id="message" name="message" rows="4" cols="50" required></textarea><br>

    <input type="submit" value="Send">
</form>

</body>
</html>
