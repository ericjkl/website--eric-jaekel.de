<!DOCTYPE html>

<html lang="de-de" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Kontakt</title>
    <meta name="description" content="Falls Sie Fragen, Anregungen oder ein anderes Anliegenh haben, können Sie diese hier äußern." />
    <?php include 'IncludedContent/head.php';?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

    <?php
    include 'IncludedContent/menu.php';
    ?>

    <div class="ContentBox-FormalText">
        
        <h1>Kontakt</h1>
        <form id="message" method="post" action="input.php">
            <label form="message">
                <label for="name">Name:</label>
                <input type="name" id="name" name="name" placeholder="Max Mustermann" autocapitalize="word" autocomplete="name" required />
                
                <label for="email">E-mail Adresse:</label>
                <input type="email" id="email" name="email" placeholder="Beispiel@domain.de" autocomplete="email" required />
                
                <label for="message">Nachricht:</label>
                <textarea id="message" placeholder="Nachricht" name="message" required></textarea>

                <div class="g-recaptcha" data-sitekey="6LdHx4wUAAAAAMY_RLaS6zaIhXhMc_F8_TPqp10u"></div>
                <input type="submit" name="submit" value="Anfrage senden" class="button-primary button-content">
                
            </label>
        </form>

        <p>Alternativ können Sie auch eine E-mail an <strong>info@eric-jaekel.de</strong> schreiben.</p>
    </div>

    <?php
    include 'IncludedContent/footer.php';
    ?>
    
</body>
</html>