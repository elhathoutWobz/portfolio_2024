<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Set recipient email address
    $to = "abdelaazizeelhathoute.2018@gmail.com"; // Change this to your email

    // Set email headers
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // Compose email content
    $email_content = "
    <h2>New Message from Contact Form</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Subject:</strong> $subject</p>
    <p><strong>Message:</strong><br>$message</p>
    ";

    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Message sent successfully.";
        header("Location: ../index.html");

    } else {
        echo "Failed to send message. Please try again later.";
    }
} else {
    // Redirect back to the contact form page if accessed directly
    header("Location: contact_form.php");
    exit;
}

