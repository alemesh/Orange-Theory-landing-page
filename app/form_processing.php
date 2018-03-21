<?php
//****************************************
//edit here
$senderName = 'Ronson';
$senderEmail = $_SERVER['SERVER_NAME'];
$targetEmail = [];
$targetEmail = ['ravit@gofmans.co.il', 'office@ronson.co.il', 'idan@ronson.co.il'];
//$targetEmail = ['alemesh@acceptic.com'];
$messageSubject = 'Message from web-site - '. $_SERVER['SERVER_NAME'];
$redirectToReferer = true;
$redirectURL = $_SERVER['SERVER_NAME'];
//****************************************

// mail content

//var_dump($_POST); die;
$ufname = $_POST['name'];
$uphone = $_POST['tel'];
$umail = $_POST['email'];
$check = $_POST['check1'];


if ($check == 'on') {
    $sendDok = $redirectURL . '/orange-theory-local/test.txt';
    // prepare message text
    $messageText =	'First Name: '.$ufname."\n".
        'Phone: '.$uphone."\n".
        'Email: '.$umail."\n".
        'Dok: http://'.$sendDok."\n";
}else{
    // prepare message text
    $messageText =	'First Name: '.$ufname."\n".
        'Phone: '.$uphone."\n".
        'Email: '.$umail."\n";
}


//// prepare message text
//$messageText =	'First Name: '.$ufname."\n".
//    'Phone: '.$uphone."\n".
//    'Email: '.$umail."\n";

// send email
$senderName = "=?UTF-8?B?" . base64_encode($senderName) . "?=";
$messageSubject = "=?UTF-8?B?" . base64_encode($messageSubject) . "?=";
$messageHeaders = "From: " . $senderName . " <" . $senderEmail . ">\r\n"
    . "MIME-Version: 1.0" . "\r\n"
    . "Content-type: text/plain; charset=UTF-8" . "\r\n";

//if (preg_match('/^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/',$targetEmail,$matches))
foreach ($targetEmail as $val){
    mail($val, $messageSubject, $messageText, $messageHeaders);
}




$redirectToTnxPage = 'http://campaign.gofmans.co.il/OTF/tnx.html?Lead=true';
// redirect
if($redirectToReferer) {
    header("Location: ".$redirectToTnxPage);
} else {
    header("Location: ".$redirectURL);
}

