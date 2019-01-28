<!DOCTYPE html>

<html lang="de-de" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Kontakt</title>
    <meta name="description" content="In the case you have got questions,
     suggestions or other concerns, you can express them here."/>
    <?php include 'IncludedContent/head.php'; ?>
</head>
<body>

<?php
include 'IncludedContent/menu.php';
?>

<?php
$captcha_url = "https://www.google.com/recaptcha/api/siteverify";
$captcha_secret_key = "6LdHx4wUAAAAAKnmdVTPd12nU2v9AFuMpRneXZAu";

if(array_key_exists('g-recaptcha-response', $_POST) && $_POST['g-recaptcha-response'] != "") {
    $captcha_response_key = $_POST['g-recaptcha-response'];
    $captcha_response = file_get_contents($captcha_url . '?secret=' . $captcha_secret_key . '&response=' . $captcha_response_key . '&remoteip=' . $_SERVER['REMOTE_ADDR']);
    $captcha_response = json_decode($captcha_response, true);

    if ($captcha_response['success'] == 1) {
        $submit_date = date("d.m.Y - H:i");
        $receiver1 = 'eric.jaekel@web.de';
        $receiver2 = 'info@eric-jaekel.de';
        $subject = utf8_encode('Neue Kontaktanfrage von ' . $_POST["name"]);
        $message = utf8_encode('Kontaktanfrage: ' . "\r\n\n" . 'Zeipunkt: ' . $submit_date . "\r\n" . 'Name: ' . $_POST["name"] . "\r\n" . 'E-mail: ' . $_POST["email"] . "\r\n" . 'Nachricht: ' . $_POST["message"] . "\r\n");

        ini_set('SMTP', 'send.one.com');
        ini_set('smtp_port', '465');
        $headers   = array();
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-type: text/plain; charset=utf-8";
        mail($receiver1, $subject, $message, implode("\r\n",$headers));
        $mail2 = mail($receiver2, $subject, $message, implode("\r\n",$headers));

        $captcha_bad_response = false;
    } else {
        $captcha_bad_response = true;
    }
} else {
    $captcha_bad_response = true;
}
?>

<div class="ContentBox-FormalText">

    <br/><br/><br/>
    <?php
    if ($captcha_bad_response) {
        echo('
            <div class="alert alert-danger" role="alert">
                    <h2>Verification error</h2>
                    <p>Your request could not be processed because it was not verified properly. Probably, you did not complete the reCaptcha correctly.</p>
                </div>
                <h3>Where do you want to continue?</h3>
                <a href="index.php">
                    <div class="button-primary button-content">
                        To the Homepage
                        <div class="button-image-wrapper">
                            <i class="material-icons">chevron_right</i>
                        </div>                
                    </div>
                </a>
                <a href="gallery.php">
                    <div class="button-primary button-content">
                        To gallery
                        <div class="button-image-wrapper">
                            <i class="material-icons">chevron_right</i>
                        </div>                
                    </div>
                </a>
        ');
    } else if ($mail2) {
        echo('
                <div class="alert alert-success" role="alert">
                    Your message was sent successfully!
                </div>
                <h4>Here is your submitted data again:</h4>
                <h5>Name: ' . utf8_encode($_POST["name"]) . '</h5>
                <h5>E-mail address: ' . utf8_encode($_POST["email"]) . '</h5>
                <h5>message: ' . utf8_encode($_POST["message"]) . '</h5>

                <h3>Where do you want to continue?</h3>
                <a href="index.php">
                    <div class="button-primary button-content">
                        To the Homepage
                        <div class="button-image-wrapper">
                            <i class="material-icons">chevron_right</i>
                        </div>                
                    </div>
                </a>
                <a href="gallery.php">
                    <div class="button-primary button-content">
                        To gallery
                        <div class="button-image-wrapper">
                            <i class="material-icons">chevron_right</i>
                        </div>                
                    </div>
                </a>
            ');
    } else {
        echo('
                <div class="alert alert-danger" role="alert">
                    Unfortunately, an error occurred while trying to send your message. Please try
                    again later.
                </div>
                <h3>Where do you want to continue?</h3>
                <a href="index.php">
                    <div class="button-primary button-content">
                        To the homepage
                        <div class="button-image-wrapper">
                            <i class="material-icons">chevron_right</i>
                        </div>                
                    </div>
                </a>
                <a href="contact.php">
                    <div class="button-primary button-content">
                        Send new message
                        <div class="button-image-wrapper">
                            <i class="material-icons">chevron_right</i>
                        </div>                
                    </div>
                </a>
            ');
    }
    ?>

</div>

<?php
include 'IncludedContent/footer.php';
?>

</body>
</html>