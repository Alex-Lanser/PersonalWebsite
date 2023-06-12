<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  
  $to = "alexlanser02@gmail.com"; 
  $subject = "New message from your website";
  $headers = "From: $name <$email>" . "\r\n";
  
  // Send the email
  $success = mail($to, $subject, $message, $headers);
  
  if ($success) {
    echo '<script>alert("Message sent successfully!");</script>';
  } else {
    echo '<script>alert("Sorry, an error occurred. Please try again.");</script>';
  }
  
  // Redirect back to the contact page or show a success message
  header("Location: index.html"); // Replace with the appropriate page
  exit();
}
?>
