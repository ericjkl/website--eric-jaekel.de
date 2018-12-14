<!DOCTYPE html>

<html lang="de-de" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Kontakt</title>
    <meta name="description" content="In the case you have got questions,
     suggestions or other concerns, you can express them here." />
    <?php include 'IncludedContent/head.php';?>
</head>
<body>

    <?php
    include 'IncludedContent/menu.php';
    ?>    

    <?php
    $submit_date = date("d.m.Y - H:i");
    $receiver1 =    'eric.jaekel@web.de';
    $receiver2 =    'info@eric-jaekel.de';
    $subject =      utf8_decode('Neue Kontaktanfrage von '.$_POST["name"]);
    $message =      utf8_decode('Kontaktanfrage: '. "\r\n\n" .
                    'Zeipunkt: '.$submit_date."\r\n" .
                    'Name: '.$_POST["name"]."\r\n".
                    'E-mail: '.$_POST["email"]."\r\n".
                    'Nachricht: '.$_POST["message"]."\r\n");

    ini_set('SMTP', 'send.one.com');
    ini_set('smtp_port', '465');

    mail($receiver1, $subject, $message);
    $mail2 = mail($receiver2, $subject, $message);

    ?> 

    <div class="ContentBox-FormalText">        

        <br/><br/><br/>
        <?php
        if ($mail2 == true) {
            echo('
                <div class="alert alert-success" role="alert">
                    Your message was sent successfully!
                </div>
                <h4>Here is your submitted data again:</h4>
                <h5>Name: '.$_POST["name"].'</h5>
                <h5>E-mail address: '.$_POST["email"].'</h5>
                <h5>message: '.$_POST["message"]. '</h5>

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
                    Unfortunately, an error occurred when trying to send your message. Please try
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