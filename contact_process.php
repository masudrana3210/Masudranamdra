<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "masudrana01126@gmail.com";
    $from = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    // হেডার সেটআপ
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // ইমেইল সাবজেক্ট
    $email_subject = "You have a message from your Bitmap Photography: $subject";

    // লোগো এবং লিঙ্ক
    $logo = 'https://yourwebsite.com/img/logo.png'; // আপনার লোগোর লিঙ্ক দিন
    $link = 'https://yourwebsite.com'; // আপনার ওয়েবসাইট লিঙ্ক

    // HTML বডি
    $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Contact Message</title></head><body>";
    $body .= "<table style='width: 100%;'>";
    $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
    $body .= "<a href='{$link}'><img src='{$logo}' alt='Website Logo' style='max-width:200px;'></a><br><br>";
    $body .= "</td></tr></thead><tbody>";
    $body .= "<tr><td style='border:none;'><strong>Name:</strong> {$name}</td>";
    $body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td></tr>";
    $body .= "<tr><td style='border:none;'><strong>Phone:</strong> {$number}</td>";
    $body .= "<td style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
    $body .= "<tr><td colspan='2' style='border:none; padding-top:20px;'><strong>Message:</strong><br>{$message}</td></tr>";
    $body .= "</tbody></table>";
    $body .= "</body></html>";

    // ইমেইল পাঠানোর চেষ্টা
    $send = mail($to, $email_subject, $body, $headers);
    
    if($send) {
        echo "<script>alert('Message sent successfully!'); window.location.href='contact.html';</script>";
    } else {
        echo "<script>alert('Message could not be sent. Please try again later.'); window.history.back();</script>";
    }
}
?>