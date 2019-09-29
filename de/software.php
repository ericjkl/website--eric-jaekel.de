<!DOCTYPE html>

<html lang="de-de" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Software</title>
    <meta name="description" content="Aktuelle Software-Projekte wie Apps oder Websites werden hier aufgelistet." />
    <?php include 'IncludedContent/head.php';?>
</head>
<body>

    

    <div class="parallax-container" id="parallax-software">
        <h1>Software-Projekte</h1>
    </div>

    <div class="ContentBox no-img-sections">

        <?php
        include 'IncludedContent/menu.php';
        ?>

        <section class="text-with-icon" >
            <div class="section-img-wrapper">
                <img src="../sources/images/logo_ej.svg" alt="Logo / Dieses Bild kann leider nicht angezeigt werden." />
            </div>
            <div class="section-text">
                <h2>Ständige Weiterentwicklung</h2>                
                <p>In der Webentwicklung ist es besonders wichtig, seine Projekte immer weiterzuentwickeln,
                Anpassungen an eine sich sehr schnell verändernde Internet-Landschaft vorzunehmen und 
                jederzeit eine optimale Nutzererfahrung zu gewährleisten. Daher ist es notwendig, 
                gerade Webprojekte über die erste Veröffentlichung hinaus zu pflegen und hin und wieder
                auch frische Designs auszuprobieren.</p>                    
            </div>        
        </section>

        <section class="text-with-icon">
            <div class="section-img-wrapper">
                <img src="../sources/images/toolify-logo.png" alt="Toolify-Logo / Dieses Bild kann leider nicht angezeigt werden." />
            </div>
            <div class="section-text">
                <h2>Toolify</h2>
                <p>Eine App für alles: Toolify ist nicht nur die Allzweckwaffe mit nützlichen Rechnern 
                und Messgeräten, sondern beinhaltet auch einige lustige Features und Spiele. Funktionen sind unter anderem 
                Kalorienrechner, BMI-Rechner, Zinsrechner und viele weitere! Außerdem können Sie eine Distanz messen, indem Sie
                Ihr Gerät von A nach B bewegen. Um unsere App bereitzustellen,
                nutzen wir React und React-native, programmieren also auf JavaScript-Basis. Die App ist für Android verfügbar.</p>
                <div class="alert alert-warning">
                    Hinweis: Die App befindet sich derzeit noch in der Beta-Phase. D. h. es sind 
                    momentan nur einige limitierte Funktionen verfügbar.
                </div>
                <div class="section-download-box">
                    <a href="../sources/downloads/toolify-861a37471f3d494bbf230c98a9410404-signed.apk" download>
                        <div class="download-button">
                            <i class="material-icons center-vertical-line">save_alt</i>
                            Download Android (.apk)
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="text-with-icon" id="partyone">
            <div class="section-img-wrapper">
                <img src="../sources/images/partyone-logo.png"
                     alt="Toolify-Logo / Dieses Bild kann leider nicht angezeigt werden."/>
            </div>
            <div class="section-text">
                <h2>PartyOne</h2>
                <p>DIE App für Deine Party: Plane Events, erstelle Listen, teile Alles mit Deinen Freunden!
                    Mit PartyOne kannst du nicht nur deine nächste Feier super-einfach organisieren, sondern auch Gäste
                    einladen,
                    Aufgaben verteilen und noch vieles mehr. Hol sie dir jetzt!</p>
                <div class="alert alert-warning">
                    Hinweis: Die App befindet sich derzeit noch in der Beta-Phase. D. h. es sind
                    momentan nur einige limitierte Funktionen verfügbar.
                </div>
                <div class="section-download-box">
                    <a href="../sources/downloads/PartyOne-04aa68a3446849d980d8a72605c83a72-signed.apk" download>
                        <div class="download-button">
                            <i class="material-icons center-vertical-line">save_alt</i>
                            Download Android (.apk)
                        </div>
                    </a>
                </div>
            </div>
        </section>


    </div>

    <?php
    include 'IncludedContent/footer.php';
    ?>
    
</body>
</html>