<?php 
    require "PHPMailerAutoload.php";
    $mail = new PHPMailer();

    $name = $_POST["name"];
    $name = ($name ? $name : 'No name');
    $email = $_POST["email"];
    $class = $_POST["class"];

    $mail->SMTPDebug = 3;

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = "smtp.gmail.com";  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = "coding.edge.smtp@gmail.com";                 // SMTP username
    $mail->Password = "sxqWkz9NFC";                           // SMTP password
    $mail->SMTPSecure = "ssl";                         // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->From = "coding.edge.smtp@gmail.com";
    $mail->FromName = "$name";
    $mail->addAddress("hash.coding.edge@gmail.com", "codingEdge Registration");     // Add a recipient

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = "Student Registration";
    $mail->Body    = "Name: $name\n<br>Email: $email\n<br>Class ID: $class";

    if(!$mail->send()) {
        http_response_code(500);
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        http_response_code(200);
        echo 'success';
    }
?>
