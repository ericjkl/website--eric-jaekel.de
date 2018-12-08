<!DOCTYPE html>

<html lang="de-de" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Eric Jäkel - Home</title>
    <meta name="description" content="Auf dieser Seite finden Sie den besten Fotograf der Welt. Es gibt Fotos von Landschaften, Makros, Sternen, Action, Events und vielem mehr." />
    
    <?php include "sources/IncludedContent/head.php";?>
    
</head>
<body>

    <div class="modal fade show bgblack" tabindex="-1" role="dialog" id="langNotification">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Hello friend!</h3>
                    <button type="button" class="close" onclick="closeLangNotification()" aria-label="Close">
                    <span aria-hidden="true" class="icon-x-nobootstrap">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>It seems that you are visiting this page from outside of Germany. Do you want to go to
                    the international version of this website?</p>
                    <p>Falls Sie die Seite auf Deutsch ansehen möchten, schließen Sie diese Nachricht einfach.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeLangNotification()">Close</button>
                    <a href="./en/">
                        <button type="button" class="btn btn-primary">Go to English version</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        let langNotification = document.getElementById('langNotification');

        function closeLangNotification() {
            langNotification.style.display = "none";
            // resetScrolling();
        }
        let UserLanguageCode = navigator.language.toLowerCase();
        let UserLanguage;
        if (UserLanguageCode == "de-de" ||
            UserLanguageCode == "de" ||
            UserLanguageCode == "de-at" ||
            UserLanguageCode == "de-li" ||
            UserLanguageCode == "de-lu" ||
            UserLanguageCode == "de-ch") {
            UserLanguage = "German";
        } else {
            langNotification.style.display = 'block';
            // disableScrolling();
            document.getElementById('closeLangNotif').addEventListener("click", closeLangNotification);
            UserLanguage = "English";
        }
        console.log("User language set to " + UserLanguage);

    </script>

    <div class="parallax-container" id="parallax-index">
        <h1>Eric Jäkel</h1>
        <p>Fotograf. Webdesigner. Software-Entwickler.</p>
    </div>

    <div class="ContentBox">

        <?php include "sources/IncludedContent/menu.php"; ?>

        <section>
            <img src="sources/images/landscapes/DSC07282.jpg" id="firstimgIndex" alt="Dieses Bild kann leider nicht angezeigt werden. :("/>
            <div>
                <h2>Hallo!</h2>
                <p>
                    Ich heiße Eric, komme aus Leipzig und bin derzeit dabei, mein Abitur zu machen.
                    Als leidenschaftlicher Fotograf fotografiere ich vor allem Landschaften und
                    Makro-Motive. Außerdem bin ich als Eventfotograf auf kleineren Veranstaltungen tätig.
                    Zudem bin ich Webdesigner und habe einige Android- und iOS-Apps entwickelt.
                </p>
            </div>
        </section>


        <section>
            <img src="sources/images/landscapes/009landscapes.jpg" alt="Landschaft / Dieses Bild kann leider nicht angezeigt werden. :("/>
            <div>
                <h2>Landschaften</h2>
                <p>
                    Am meisten Spaß macht mir das Fotografieren von Landschaften. Weite Flächen
                    und dramatische Wolkenkonstellationen sind ebenso atemberaubend wie
                    majestätische Berge oder Felsformationen. Um die
                    beeindruckendsten Landschaften und schönsten Motive der Welt einzufangen,
                    reise ich viel und war unter anderem in den USA, Norwegen, Irland oder
                    Spanien.
                </p>
            </div>
        </section>

        <section>
            <img src="sources/images/macro/001macro.jpg" alt="Blüte / Dieses Bild kann leider nicht angezeigt werden. :("/>
            <div>
                <h2>Makro</h2>
                <p>
                    Im Gegensatz zu gigantischen Landschaften finde ich winzige Motive wie
                    Blüten oder Insekten unglaublich faszinierend. Es ist immer wieder
                    interessant zu sehen, wie die Natur ineinander greift und wie wichtig
                    kleinste Lebewesen wie Bienen für gesamte Ökosysteme sind. Auch ist es
                    beachtlich, welche ausgefallenen Strukturen in der Natur vorkommen.
                </p>
            </div>
        </section>

        <section>
            <img src="sources/images/landscapes/DSC07654.jpg" alt="Gletscherwanderung / Dieses Bild kann leider nicht angezeigt werden. :("/>
            <div>
                <h2>Sport, Action &amp; Events</h2>
                <p>
                    Zusätzlich bin ich außerdem auf Veranstaltungen als Eventfotograf tätig
                    und halte sehr belebte und actionreiche Momente fest.
                </p>
            </div>
        </section>

        <section>
            <img src="sources/images/other/003other.jpg" alt="Sternenhimmel / Dieses Bild kann leider nicht angezeigt werden. :("/>
            <div>
                <h2>Alles Andere</h2>
                <p>
                    Natürlich fotografiere ich auch noch viele weitere Dinge, wie beispielsweise
                    Sterne, Architektur, Urbane Motive oder Wildtiere.
                </p>
            </div>
        </section>

        
        <div class="bigButton">
            <a href="gallery.php">
                <div class="center-vertical bigButton-text">
                    <h3>Weiter zur Fotogalerie</h3>
                </div>
                <div class="center-vertical bigButton-icon">
                    <i class="material-icons">arrow_forward</i>
                </div>
            </a>
        </div>

        <div class="ContentBox no-img-sections">
            <h1 class="center-horizontal">Interessiert?</h1>
            <p class="center-horizontal">Sie haben Interesse an meinen Fotos und möchten mich gerne buchen?
                Hier sind Ihre Vorteile:</p>

            <section class="text-with-icon">
                <div class="section-img-wrapper">
                    <img src="sources/images/icon-nomoney.svg" />
                </div>
                <div class="section-text">
                    <h2>Alles völlig kostenlos</h2>
                    <p>Ja, richtig gelesen! Wenn Sie mich als Fotograf buchen, kostet Sie das
                        <strong>keinen Cent</strong>. Da ich noch ein sehr junger Fotograf bin,
                        sehe ich jeden Auftrag als Chance, neue Erfahrungen zu sammeln und meine
                        Fähigkeiten weiterzuentwickeln. Wenn Sie am Ende zufrieden sind und Ihnen meine
                        Bilder gefallen, freue ich mich natürlich
                        trotzdem sehr über eine Spende.</p>
                </div>
            </section>

            <section class="text-with-icon">
                <div class="section-img-wrapper">
                    <img src="sources/images/icon-flexibility.svg" />
                </div>
                <div class="section-text">
                    <h2>Hohe Flexibilität</h2>
                    <p>Ich mache Fotos aller Art - ob bei einer Feier, bei Sportereignissen,
                    sonstigen Veranstaltungen oder einem Portraitshooting. Sie haben konkrete
                    Vorstellungen oder vertrauen auf meine Kreativität - alles kein Problem.</p>
                </div>
            </section>

        </div>

        <div class="bigButton">
            <a href="contact.php">
                <div class="center-vertical bigButton-text">
                    <h3>Kontakt</h3>
                    <p>Wenn Sie sich entchieden haben oder noch Fragen offen sind, schreiben
                    Sie mir gerne!</p>
                </div>
                <div class="center-vertical bigButton-icon">
                    <i class="material-icons">arrow_forward</i>
                </div>
            </a>
        </div>

        <section class="change-ratio">
            <img src="sources/images/icon-donate.png" alt="Sternenhimmel / Dieses Bild kann leider nicht angezeigt werden. :("/>
            <div>
                <h2>Begeistert?</h2>
                <p>Sie finden meine Bilder super und möchten mich unterstützen? Dann
                freue ich mich sehr über eine Spende. Dadurch helfen Sie mir, meine Arbeit
                immer besser zu machen, Motivation zu finden und vor allem, einen Teil meines
                Lebensunterhaltes zu finanzieren. Bedenken Sie, dass ich als Schüler und als
                junger und noch unerfahrener Fotograf auf externe Unterstützung angewiesen bin.</p>

                <a href="https://www.patreon.com/join/ericjkl">
                    <div class="button-primary button-content button-no-icon">
                        jetzt Spenden
                    </div>
                </a>

                <div class="alert alert-info" role="alert">
                    Hinweis: Mit dem Klick auf den Button "jetzt spenden" werden Sie auf
                    die Plattform Patreon weitergeleitet, über welche der Spendenvorgang
                    abgewickelt wird. Hier erhalten Sie <a href="https://support.patreon.com/hc/en-us" class="link-prm">
                    weitere Informationen über Patreon</a>. Wenn Sie trotzdem noch Fragen
                    haben, können Sie mich selbstverständlich auch kontaktieren.
                </div>

            </div>


        </section>

    </div>





    <?php
    include "sources/IncludedContent/footer.php";
    ?>

    <div class="NotificationAlert" id="notificationAlert1" style="display: none;">
        <p>Diese Seite verwendet Cookies, um die Nutzererfahrung zu verbessern.
        Mit der Nutzung dieser Seite stimmen Sie dem zu.</p>
        <a href="privacy-policy.php#cookies">
            <div class="formalButton">
                Weitere Informationen
                <img src="sources/images/ic_arrow_next.svg" />
            </div>
        </a>
        <img src="sources/images/ic_close.svg" onclick="CloseNotificationAlert()" />
    </div>



</body>
</html>