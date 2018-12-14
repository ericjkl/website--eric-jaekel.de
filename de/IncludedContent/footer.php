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
                <img src="/sources/images/instagram-logo.png" />
            </a>
            <a href="https://www.facebook.com/profile.php?id=100009464524622">
                <img src="/sources/images/facebook-logo-blue.png" />
            </a><br/>
            <a href="https://www.patreon.com/join/ericjkl">
                <img src="/sources/images/Patreon_Navy.jpg" id="patreon-wordmark"/>
            </a>
        </div>

        <p>© Copyright 2018 Eric Jäkel</p>
    </footer>