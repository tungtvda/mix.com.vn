<?php

/**
 * @author vdbkpro
 * @copyright 2013
 */

require_once('class.phpmailer.php');  
function SendMail($Sendto,$Body,$Subject)
{
    $mail = new PHPMailer();
    $mail->CharSet = "UTF-8";

    $mail->IsSMTP();

    $mail->SMTPDebug = 0;

    $mail->Debugoutput = "html";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPSecure = "tls";
    $mail->SMTPAuth = true;
    $mail->Username = 'qsg546.qsoft@gmail.com';
    $mail->Password = 'edbhqegduzpmwuui';
    $mail->SetFrom('sales@mixtourist.com', 'Mixtourist.com');
    $mail->AddReplyTo('sales@mixtourist.com', "");
    $mail->AddAddress($Sendto,'test');
    $mail->Subject = "" . $Subject . "";
    $mail->MsgHTML("" . $Body . "");
    $mail->AltBody = "" . $Subject . "";

    if (!$mail->Send()) {

    } else {

    }
}  
?>