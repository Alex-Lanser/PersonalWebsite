<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = "New message from: $name <$email>" . "\r" . $_POST["message"];
  // $message = $_POST["message"];
  
  $to = "alexlanser02@gmail.com"; 
  $subject = "NEW MESSAGE FROM YOUR WEBSITE";
  $headers = "From: $name <$email>" . "\r\n";

  
  // Send the email
  $success = mail($to, $subject, $message, $headers);
  $successMessage = 'Message sent successfully!';
  echo '<script>alert("' . $successMessage . '");</script>';

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

  // Redirect to index.html
  echo '<script>window.location.href = "index.html";</script>';
  exit();
}
?>
