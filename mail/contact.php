<?php
if (empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "error"; // Send an error response
    exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']);
$email = strip_tags(htmlspecialchars($_POST['email']);
$m_subject = strip_tags(htmlspecialchars($_POST['subject']);
$message = strip_tags(htmlspecialchars($_POST['message']);

$to = "soham1255@gmail.com";
$subject = "$m_subject: $name";
$body = "You have received a new message from your website contact form.\n\nHere are the details:\n\nName: $name\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
$header = "From: $email";
$header .= "Reply-To: $email";

if (mail($to, $subject, $body, $header)) {
    echo "success"; // Send a success response
} else {
    echo "error"; // Send an error response
}
?>
