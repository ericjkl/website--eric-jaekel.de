<!DOCTYPE html>

<html lang="en-us" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Software</title>
    <meta name="description" content="Here you can review current software projects including apps
    or websites" />
    <?php include 'IncludedContent/head.php';?>
</head>
<body>

    

    <div class="parallax-container" id="parallax-software">
        <h1>Software projects</h1>
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
                <h2>Develop constantly</h2>
                <p>In web development it is essential to always enhance your projects, perform
                    adjustments to a very fast-changing web landscape and to ensure an optimal
                    user experience at any time. As a consequence it is required to maintain
                    web projects beyond the moment of publishing, but also to try out fresh designs
                    from time to time as well.</p>
            </div>        
        </section>

        <section class="text-with-icon">
            <div class="section-img-wrapper">
                <img src="../sources/images/toolify-logo.png" alt="Toolify-Logo / Dieses Bild kann leider nicht angezeigt werden." />
            </div>
            <div class="section-text">
                <h2>Toolify</h2>
                <p>An App for everything: Toolify ist nicht nur die Allzweckwaffe mit nützlichen Rechnern
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

        
    </div>

    <?php
    include 'IncludedContent/footer.php';
    ?>
    
</body>
</html>