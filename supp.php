   <?php
   require "connection.php";
   require 'C:\xampp\htdocs\pj\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\pj\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\pj\PHPMailer-master\src\SMTP.php';

      use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 // check for the presence of the "id" GET parameter
 
if (isset($_GET['id'])) {
   // get the ID of the row to be deleted
   $id = $_GET['id'];
   $sql = mysqli_query($con, "SELECT * FROM demandeATT WHERE id='$id' ");
   $user = mysqli_fetch_assoc($sql);
   $email = $user['email']; // récupération de l'email de l'étudiant
 
   // delete the row from the table
   $query = "DELETE FROM demandeAtt WHERE id = $id";
   $con->query($query);
 
   // send an email to the student
   $subject = 'Notification de refus';
   $message = 'Votre demande est refusé , merci ';
 
   // create a new PHPMailer object
   $mail = new PHPMailer;
 
   // set the mail recipient
   $mail->addAddress($email);
 
   // set the mail sender
   $mail->setFrom('asmaeelmakhroubi@gmail.com');
 
   // set the subject and body of the email
   $mail->Subject = $subject;
   $mail->Body = $message;
 
   // set the SMTP parameters
   $mail->isSMTP();
   $mail->Host = 'smtp.gmail.com';
   $mail->SMTPAuth = true;
   $mail->Username = 'asmaeelmakhroubi@gmail.com';
   $mail->Password = 'omaqylsmstiwrnbr';
   $mail->SMTPSecure = 'tls';
   $mail->Port = 587;
   $mail->IsHTML(true);
 
   // send the email
   if (!$mail->send()) {
     // display an error message if the email could not be sent
     echo 'Error: ' . $mail->ErrorInfo;
   } else {
     // email was sent successfully
     // show success message and refresh the page
     echo '<script type="text/javascript">';
     echo 'alert("L\'email a été envoyé avec succès !");';
     echo 'window.location.href = "http://localhost:8090/pjj/pj/liste_attestation.php";';
     echo '</script>';
   }
 }
 
 // close the database connection
 $con->close();
 ?>