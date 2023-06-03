<?php
include('connection.php');
require 'dompdf/autoload.inc.php';
require 'C:\xampp\htdocs\pj\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\pj\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\pj\PHPMailer-master\src\SMTP.php';
use Dompdf\Dompdf;
use Dompdf\Options;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$options = new Options();


$id = $_GET['id'];
//echo "hello ".$id;
//$sql = mysqli_query($con, "SELECT * FROM Module WHERE ID_MODULE='$id'");
$sql = mysqli_query($con, "SELECT * FROM Notes INNER JOIN demanderel ON Notes.apogee = demanderel.apogee INNER JOIN Module ON Notes.ID_module=Module.ID_module where demanderel.apogee='$id'");
//$sql = mysqli_query($con, "SELECT * FROM Notes INNER JOIN Etudiant ON Notes.apogee = Etudiant.apogee INNER JOIN Module ON Notes.ID_module=Module.ID_module");
//echo("<script type='text/javascript'> var answer = prompt('".$_GET['ID_module']."'); </script>");
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
require('releve_pdf.php');//attestation.php
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
$temp_pdf_file = tempnam(sys_get_temp_dir(), 'releve_');
file_put_contents($temp_pdf_file, $pdf_content);

// Attach the PDF file to the email
$mail->AddAttachment($temp_pdf_file, 'releve.pdf');


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
$query = "DELETE FROM demandeconv WHERE id = $id";
$con->query($query);

// close the database connection
$con->close();

// delete the temporary PDF file
unlink($temp_pdf_file);

//valider delete
// check if the 'id' variable is set in the URL



