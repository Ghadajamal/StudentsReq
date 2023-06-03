<?php

// include the required files
require "connection.php";
require 'dompdf/autoload.inc.php';

require 'C:\xampp\htdocs\pj\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\pj\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\pj\PHPMailer-master\src\SMTP.php';


// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_GET['id'])) {
    // get the ID of the row to be deleted
    $id = $_GET['id'];
    $id1 = $_GET['id'];
    $sql = mysqli_query($con, "SELECT * FROM demandeAtt WHERE id='$id' ");
    $user = mysqli_fetch_assoc($sql);

    $email = $user['email']; // récupération de l'email de l'étudiant

    // generate the PDF here
    $subject = 'Test d envoi d email';
    $message = 'YAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAYY';

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

    // instantiate and use the dompdf class
    $options = new Options();
    $options->set('chroot',realpath(''));
    $dompdf = new Dompdf($options);
    ob_start();
    require('attestation_pdf.php');//attestation.php
    $html = ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Get the generated PDF as a string
    $pdf_content = $dompdf->output();



// Create the PDF file on the server
$temp_pdf_file = tempnam(sys_get_temp_dir(), 'attestation_');
file_put_contents($temp_pdf_file, $pdf_content);

// Attach the PDF file to the email
$mail->AddAttachment($temp_pdf_file, 'attestation.pdf');


  // send the email
if (!$mail->send()) {
  // display an error message if the email could not be sent
  echo 'Error: ' . $mail->ErrorInfo;
} else {
  // email was sent successfully
  // show success message and refresh the page
  echo '<script type="text/javascript">';
  echo 'alert("L email a été envoyé avec succès !");';
  echo 'window.location.href = "http://localhost:8090/pjj/pj/liste_attestation.php";';
  echo '</script>';
}



// delete the row from the table
$query = "DELETE FROM demandeAtt WHERE id = $id";
$con->query($query);

// close the database connection
$con->close();

// delete the temporary PDF file
unlink($temp_pdf_file);
}
//valider delete
// check if the 'id' variable is set in the URL







?>

 














