<!-- Form handler -->
<?php

$messageSent = false;
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizing and validating the input
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    $newsletter_signup = isset($_POST['newsletter']) ? 'Yes' : 'No';

    if (!$name) {
        $errors[] = 'Name is required.';
    }
    if (!$email) {
        $errors[] = 'Please provide a valid email address.';
    }
    if (!$message) {
        $errors[] = 'Message is required.';
    }

    if (empty($errors)) {
        $to = "bester.dries@gmail.com";
        $subject = "New message from $name";

        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $body = "<html><body>";
        $body .= "<h2>New Contact Form Submission</h2>";
        $body .= "<p><strong>Name:</strong> $name</p>";
        $body .= "<p><strong>Email:</strong> $email</p>";
        $body .= "<p><strong>Message:</strong> $message</p>";
        $body .= "<p><strong>Newsletter Signup:</strong> $newsletter_signup</p>";
        $body .= "</body></html>";

        if (mail($to, $subject, $body, $headers)) {
            $messageSent = true;
        } else {
            $errors[] = 'Failed to send the message.';
        }
    }
}

?>

<!-- The form -->
<?php if ($messageSent): ?>
    <p>Thank you for contacting us. Your message has been sent!</p>
<?php else: ?>

    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="contact.php" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required><br><br>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="example@email.com" required><br><br>
        </div>
        <div class="form-group">
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" cols="50" placeholder="Type your message here..." required></textarea><br><br>
        </div>
        <div class="newsletter-box">
            <label for="newsletter">Sign up for my newsletter</label>
            <input type="checkbox" id="newsletter" name="newsletter" value="yes">
        </div>
        
        <input id="submit-contact" class="primary-button" type="submit" value="Submit">
    </form>

<?php endif; ?>