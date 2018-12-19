<!DOCTYPE html>

<html lang="de-de" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>404 - Not Found</title>
    <script>

    </script>
    <?php include ($_SERVER['DOCUMENT_ROOT'].'/en/IncludedContent/head.php');?>
</head>
<body>

    <div id="menu-de" style="display: none;">
        <?php
        include ($_SERVER['DOCUMENT_ROOT'].'/de/IncludedContent/menu.php');
        ?>
    </div>

    <div id="menu-en">
        <?php
        include ($_SERVER['DOCUMENT_ROOT'].'/en/IncludedContent/menu.php');
        ?>
    </div>

    <div id="content-en">
        <div class="ContentBox-FormalText">

            <h1>Oops! Error 404</h1>
            <p>The requested site was displaced, deleted or does not exist.</p>
            <p>Possibly, the link or the URL you used was incorrect.</p>
            <h2>What now?</h2>
            <a href="../en/index.php">
                <div class="button-primary button-content">
                    To the Homepage
                    <div class="button-image-wrapper">
                        <i class="material-icons">chevron_right</i>
                    </div>
                </div>
            </a>
            <br/>
            <a href="javascript:history.back()">
                <div class="button-primary button-content">
                    Back to previous page
                    <div class="button-image-wrapper">
                        <i class="material-icons">chevron_right</i>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div id="content-de" style="display: none;">
        <div class="ContentBox-FormalText" id="de">

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
    </div>

    <div id="footer-en">
        <?php
        include ($_SERVER['DOCUMENT_ROOT'].'/en/IncludedContent/footer.php');
        ?>
    </div>

    <div id="footer-de" style="display: none;">
        <?php
        include ($_SERVER['DOCUMENT_ROOT'].'/de/IncludedContent/footer.php');
        ?>
    </div>

    <script>
        let UserLanguageCode = navigator.language.toLowerCase();
        if (UserLanguageCode == "de-de" ||
            UserLanguageCode == "de" ||
            UserLanguageCode == "de-at" ||
            UserLanguageCode == "de-li" ||
            UserLanguageCode == "de-lu" ||
            UserLanguageCode == "de-ch") {
            document.getElementById("menu-en").style.display = "none";
            document.getElementById("content-en").style.display = "none";
            document.getElementById("footer-en").style.display = "none";
            document.getElementById("menu-de").style.display = "block";
            document.getElementById("content-de").style.display = "block";
            document.getElementById("footer-de").style.display = "block";
        }
    </script>
    
</body>
</html>