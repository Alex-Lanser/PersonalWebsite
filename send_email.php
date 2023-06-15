<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  
  $to = "alexlanser02@gmail.com"; 
  $subject = "NEW MESSAGE FROM YOUR WEBSITE";
  $headers = "From: $name <$email>" . "\r\n";
  
  
  // Send the email
  $success = mail($to, $subject, $message, $headers);

  // Database connection details
  $host = "localhost"; 
  $username = "id20917310_alexlanserinformation";
  $password = "AlexLanserInformation02252002!";
  $dbname = "id20917310_information";
  
  // Create a new database connection
  $conn = new mysqli($host, $username, $password, $dbname);

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  // Prepare and execute the database query
  $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')");
  $stmt->bind_param("sss", $name, $email, $message);
  $stmt->execute();
  
  // Close the statement and database connection
  $stmt->close();
  $conn->close();

  // Set up email parameters
  $to = $email;
  $subject = "Thank you for your message regarding Alex Lanser";
  $body = "Dear $name,\n\nThank you for your message and your time. I will get back to you shortly!\n\nThanks,\nAlex Lanser";
  $headers = "From: alexlanser02@gmail.com"; 

  // Send the email
  $mailSent = mail($to, $subject, $body, $headers);

  // Check if the email was sent successfully
  if ($mailSent) {
    // Email sent successfully, redirect the user back to index.html
    header("Location: index.html");
    exit;
  } else {
    // Email failed to send, handle the error (e.g., display an error message)
    echo "Oops! An error occurred while sending the email. Please try again later.";
  }
}
?>
