<!DOCTYPE html>

<html lang="de-de" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Contact</title>
    <meta name="description" content="In the case you have got questions,
     suggestions or other concerns, you can express them here." />
    <?php include 'IncludedContent/head.php';?>
</head>
<body>

    <?php
    include 'IncludedContent/menu.php';
    ?>    

    <div class="ContentBox-FormalText">
        
        <h1>Contact</h1>
        <form id="message" method="post" action="input.php">
            <label form="message">
                <label for="name">Name:</label>
                <input type="name" id="name" name="name" placeholder="John Doe" autocapitalize="word" autocomplete="name" required />
                
                <label for="email">E-mail Adress:</label>
                <input type="email" id="email" name="email" placeholder="email@example.com" autocomplete="email" required />
                
                <label for="message">Message:</label>
                <textarea id="message" placeholder="Message" name="message"></textarea>
                
                <input type="submit" value="Submit message" class="button-primary button-content">
                
            </label>
        </form>

        <p>As an alternative, you can write an e-mail to <strong>info@eric-jaekel.de</strong>.</p>
    </div>

    <?php
    include 'IncludedContent/footer.php';
    ?>
    
</body>
</html>