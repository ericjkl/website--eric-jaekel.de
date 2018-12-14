<!DOCTYPE html>

<html lang="de-de" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>404 - Not Found</title>
    <?php include 'IncludedContent/head.php';?>
</head>
<body>    

    <?php
    include 'IncludedContent/menu.php';
    ?>

    <div class="ContentBox-FormalText">        
    
        <h1>Hoppla! Fehler 404</h1>
        <p>Die angeforderte Seite wurde verschoben, gelöscht oder existiert nicht.</p>
        <p>Möglichrweise ist der Link oder die URL, die Sie benutzt haben, fehlerhaft.</p>
        <h2>Und jetzt?</h2>
        <a href="index.php">
            <div class="button-primary button-content">
                Zur Homepage
                <div class="button-image-wrapper">
                    <i class="material-icons">chevron_right</i>
                </div>                
            </div>
        </a>
        <br/>
        <a href="javascript:history.back()">
            <div class="button-primary button-content">
                Zurück zur vorherigen Seite
                <div class="button-image-wrapper">
                    <i class="material-icons">chevron_right</i>
                </div>                
            </div>
        </a>
    </div>

    <?php
    include 'IncludedContent/footer.php';
    ?>
    
</body>
</html>