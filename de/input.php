<!DOCTYPE html>

<html lang="de-de" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Kontakt</title>
    <meta name="description" content="Falls Sie Fragen, Anregungen oder ein anderes Anliegenh haben, können Sie diese hier äußern." />
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
    $subject =      utf8_encode('Neue Kontaktanfrage von '.$_POST["name"]);
    $message =      utf8_encode('Kontaktanfrage: '. "\r\n\n" .
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
                    Ihre Anfrage wurde erfolgreich abgeschickt!
                </div>
                <h4>Hier sind Ihre Daten noch einmal im Überblick:</h4>
                <h5>Name: '.utf8_encode($_POST["name"]).'</h5>
                <h5>E-mail-Adresse: '.utf8_encode($_POST["email"]).'</h5>
                <h5>Nachricht: '.utf8_encode($_POST["message"]). '</h5>

                <h3>Wo möchten Sie weitermachen?</h3>
                <a href="index.php">
                    <div class="button-primary button-content">
                        Zur Homepage
                        <div class="button-image-wrapper">
                            <i class="material-icons">chevron_right</i>
                        </div>                
                    </div>
                </a>
                <a href="gallery.php">
                    <div class="button-primary button-content">
                        Zur Fotogalerie
                        <div class="button-image-wrapper">
                            <i class="material-icons">chevron_right</i>
                        </div>                
                    </div>
                </a>
            ');
        } else {
            echo('
                <div class="alert alert-danger" role="alert">
                    Beim Senden ist ein Fehler aufgtreten. Versuchen Sie es später noch einmal.
                </div>
                <h3>Wo möchten Sie weitermachen?</h3>
                <a href="index.php">
                    <div class="button-primary button-content">
                        Zur Homepage
                        <div class="button-image-wrapper">
                            <i class="material-icons">chevron_right</i>
                        </div>                
                    </div>
                </a>
                <a href="contact.php">
                    <div class="button-primary button-content">
                        Erneute Anfrage senden
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