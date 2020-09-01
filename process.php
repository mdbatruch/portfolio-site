<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
  header('Location: index.php');
  exit();
}

$smtp = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/smtp.ini');

require 'recaptcha.php';

use Phelium\Component\reCAPTCHA;
require 'mail/PHPMailerAutoload.php';
// use PHPMailer;

error_reporting(E_ALL);
ini_set('display_errors', 1);

$data = array();
$errors = array();

$reCAPTCHA = new reCAPTCHA($smtp['recaptchapublic'], $smtp['recaptchaprivate']);
        
        
//ERROR IF STATEMENTS FOR ALL INPUTS
 
    if ( empty($_POST['firstname'])) {
        $errors['firstname'] = 'Please enter your first name';    
    }
    
    if (empty($_POST['lastname'])) {
        $errors['lastname'] = 'Please enter your last name';
    }
    
    if (empty($_POST['email'])) {
        $errors['email'] = 'Please enter your email';
    } else if (!filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) ){
        $errors['email'] = 'Please enter a valid email address';
    }

    if (empty($_POST['message'])){
        $errors['message'] = 'Please enter a message';
    }

    if ( !$reCAPTCHA->isValid($_POST['grecaptcha'])){
        $errors[ 'grecaptcha' ] = 'Your recaptcha did not validate';
    }

    $msg = "Name: " . $_POST['firstname'] . " " . $_POST['lastname'] . "<br/>";
    $msg .= "Email: " . $_POST['email'] . "<br/>";
    $msg .= "Message: " . $_POST['message'];

    // $msg = "<table>" .
    //     "<tr><th>First Name</th><th> " . $_POST['firstname'] . 
    //     "</th></tr><tr><th>Last Name</th><th>" . $_POST['lastname'] . 
    //     "</th></tr><tr><th>Email</th><th>" . $_POST['email'] . 
    //     "</th></tr><tr><th>Message</th><th>" . $_POST['message'] . 
    //     "</th></tr></table>";

    if(!empty($errors)){
        $data['success'] = false;
        $data['errors'] = $errors;
        $data['message'] = 'There was an error with your submission. Please review and try again.';
    } else {

        // require_once('mail/PHPMailerAutoload.php');

        $mail = new PHPMailer;

        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = $smtp['host'];
        $mail->SMTPAuth = true;
        $mail->Username = $smtp['username'];
        $mail->Password = $smtp['password'];
        // $mail->SMTPSecure = 'tls';
        $mail->SMTPSecure = $smtp['secure'];
        // $mail->SMTPSecure = 'false';
        // $mail->Port = 587;
        $mail->Port = $smtp['port'];
        // $mail->Port = 80;
        $mail->From = $smtp['from'];
        $mail->FromName = "ContactForm";
        $mail->AddAddress($smtp['recipient']);
        $mail->AddReplyTo($_POST['email']);
        $mail->isHTML(true);
        $mail->Subject = "New website message from: " . $_POST['firstname'] . " " . $_POST['lastname'];
        $mail->Body = $msg;

        if (!$mail->Send()) {
            $data['success'] = false;
            $data['message'] = 'There was a problem sending your form. please contact ' . $smtp['recipient'] . ' directly for further correspondence.';
        } else {
            $data['success'] = true;
            $data['message'] = "Success! Your Message has been sent. I will be in touch shortly.";
        }
    }

    echo json_encode($data);
?>