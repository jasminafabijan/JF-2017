<?php
              require 'PHPMailerAutoload.php';

              if ( isset($_REQUEST['submitButton']) )
              {
                  $name = $_REQUEST['name'];
                  $email = $_REQUEST['email'];
                  $message = $_REQUEST['message'];

                  if ($name == '' || $email == '' || $message == '') {
                    echo '<div class="error-message">You must fill in name, email and message.</div>';
                  } else {

                    $mail = new PHPMailer;

                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.jasminafabijan.com';                       // Specify main and backup server
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'webmaster@jasminafabijan.com';            // SMTP username
                    $mail->Password = 'jadran2012';                       // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
                    //$mail->SMTPDebug = 1;

                    $mail->From = 'webmaster@jasminafabijan.com';
                    $mail->FromName = 'jasminafabijan.com';
                    $mail->addAddress('darko@renderedtext.com');           // Name is optional
                    $mail->addReplyTo($email, $name);


                    $mail->Subject = 'RFP: ' . $job_type;
                    $mail->Body    = $message;

                    if(!$mail->send()) {
                       echo '<div class="error-message">Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '</div>';
                       exit;
                    } else {
                      echo '<div class="success-message">Message has been sent. Thank you! I will respond shortly.</div>';
                    }

                  }
              }
            ?>
