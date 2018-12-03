<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Eric Jäkel - Home</title>
    <meta name="description" content="On this page you find the best photographer in the world! You can explore photos of landscapes, macros, stars, action, events and much more." />
    
    <?php include '../sources/IncludedContent/head.php';?>
    
</head>
<body>

    <div class="parallax-container" id="parallax-index">
        <h1>Eric Jäkel</h1>
        <p>Fotograf. Webdesigner. Software-Entwickler.</p>
    </div>

    <div class="ContentBox">

        <?php include '../sources/IncludedContent/menu.php'; ?>

        <div class="alert alert-warning">Note: So far this is the only site on my domain available in English. Other sites are
        still in German but you can use the Google Translator widget.</div>

        <section>
            <img src="../sources/images/landscapes/DSC07282.jpg" id="firstimgIndex" alt="Dieses Bild kann leider nicht angezeigt werden. :("/>
            <div>
                <h2>Hi there!</h2>
                <p>
                    My name is Eric, I am from Leipzig, Germany and I am studying at high school.
                    As a passionate photographer I mostly capture macros and landscapes.
                    Additionally I am photographing at smaller events plus, I am a webdesigner an have 
                    built a few applications for Android and iOS.
                </p>
            </div>
        </section>


        <section>
            <img src="/sources/images/landscapes/009landscapes.jpg" alt="Landschaft / Dieses Bild kann leider nicht angezeigt werden. :("/>
            <div>
                <h2>Landscapes</h2>
                <p>
                    I love photographing landscapes. Wide areas and dramatic cloud
                    constellations are as breathtaking as majestic mountains. To capture the
                    most impressive landscapes I travel a lot to foreign countries, including the 
                    US, Norway, or Iceland.
                </p>
            </div>
        </section>

        <section>
            <img src="/sources/images/macro/001macro.jpg" alt="Blüte / Dieses Bild kann leider nicht angezeigt werden. :("/>
            <div>
                <h2>Macro</h2>
                <p>
                    As a contrast to huge landscapes I am fascinated by flowers or insects. 
                    It is always interesting seeing how nature works and what role tiny creatures
                    like bees are essential for whole ecosystems.
                </p>
            </div>
        </section>

        <section>
            <img src="/sources/images/landscapes/DSC07654.jpg" alt="Gletscherwanderung / Dieses Bild kann leider nicht angezeigt werden. :("/>
            <div>
                <h2>Sport, Action &amp; Events</h2>
                <p>
                    Additionally, I am an event photographer and freeze moments
                    full of action and energy.
                </p>
            </div>
        </section>

        <section>
            <img src="/sources/images/other/003other.jpg" alt="Sternenhimmel / Dieses Bild kann leider nicht angezeigt werden. :("/>
            <div>
                <h2>Everything else</h2>
                <p>
                    There are a lot more things I like to photograph e. g. nightscapes, animals and urban
                    motives.
                </p>
            </div>
        </section>

        
        <div class="bigButton">
            <a href="/gallery.php">
                <div class="center-vertical bigButton-text">
                    <h3>To gallery</h3>
                </div>
                <div class="center-vertical bigButton-icon">
                    <i class="material-icons">arrow_forward</i>
                </div>
            </a>
        </div>
        
            

    </div>



    <?php
    include '/sources/IncludedContent/footer.php';
    ?>

    <div class="NotificationAlert" id="notificationAlert1" style="display: none;">
        <p>This site uses cookies to improve user-friendliness. By using this site,
        you agree to this.</p>
        <a href="/privacy-policy.php#cookies">
            <div class="formalButton">
                Additional Information
                <img src="/sources/images/ic_arrow_next.svg" />
            </div>
        </a>
        <img src="/sources/images/ic_close.svg" onclick="CloseNotificationAlert()" />
    </div>

</body>
</html>