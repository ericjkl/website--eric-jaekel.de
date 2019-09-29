<footer>
    <script>
        function setNewLanguage(languageToSet) {
            let url = window.location.pathname;
            let currentPage = url.substring(url.lastIndexOf('/')+1);
            window.location = "../"+languageToSet+"/"+currentPage;
        }
    </script>
        <div>
            <h2>Info</h2>
            <ul>
                <li><p><a href="imprint.php">Impressum</a></p></li>
                <li><p><a href="imprint.php#fairUse">Fair Use</a></p></li>
                <li><p><a href="privacy-policy.php">Datenschutz</a></p></li>
                <li><p><a href="open-source-licenses.php">Open Source</a></p></li>
                <li><p><a href="contact.php">Kontakt</a></p></li>
            </ul>
        </div>

        <div>
            <h2>Navigation</h2>
            <ul>
                <li><p><a href="index.php">Home</a></p></li>
                <li><p><a href="gallery.php">Fotogalerie</a></p></li>
                <li><p><a href="software.php">Software</a></p></li>
                <li><p><a href="#top">Nach oben</a></p></li>                
                <li><p><a href="javascript:history.back()">Zurück</a></p></li>
                <li><p><a href="" class="grey disabled-nobootstrap" onclick="return false;">Deutsch</a> / <a href="" onclick="setNewLanguage('en'); return false;">English</a></p></li>
            </ul>
        </div>

        <div>
            <h2>Connect</h2>
            <a href="https://www.instagram.com/eric.jkl/">
                <img class="lazyload" src="/sources/images/preloader.svg"
                     data-src="/sources/images/instagram-logo.png"/>
            </a>
            <a href="https://www.facebook.com/profile.php?id=100009464524622">
                <img class="lazyload" src="/sources/images/preloader.svg"
                     data-src="/sources/images/facebook-logo-blue.png"/>
            </a><br/>
            <a href="https://www.patreon.com/join/ericjkl">
                <img class="lazyload wide" src="/sources/images/preloader.svg"
                     data-src="/sources/images/Patreon_Navy.jpg"/>
            </a>
            <a href="https://500px.com/ericjkl">
                <img class="lazyload wide" src="/sources/images/preloader.svg"
                     data-src="/sources/images/500px_logo_light.png"/>
            </a>
            <a href="https://www.shuttout.com/user/5c8e1d6f35c94e693a160072">
                <img class="lazyload wide" src="/sources/images/preloader.svg"
                     data-src="/sources/images/shoutout-logo.png"/>
            </a>
        </div>

        <p>© Copyright <?php echo date("Y"); ?> Eric Jäkel</p>
    </footer>