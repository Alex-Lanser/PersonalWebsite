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
  $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $message);
  $stmt->execute();
  
  // Close the statement and database connection
  $stmt->close();
  $conn->close();
  
  // Redirect back to the contact page or show a success message
  header("Location: index.html");
  exit();
}
?>
