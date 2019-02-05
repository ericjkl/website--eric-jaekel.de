<div id="nav-icons">
    <a href="javascript:void(0)" onclick="showHideElem('nav-menu', 'nav-icons', 'close-menu')">
        <i class="material-icons">menu</i>
    </a>
    <a href="#top">
        <i class="material-icons">arrow_upward</i>
    </a>
</div>

<nav>
    <div class="menuContainer" id="nav-menu">
        <a id="close-menu" href="javascript:void(0)" onclick="showHideElem('nav-menu', 'nav-icons', 'close-menu')"
           style="display: none">
            <div id="menu-cancel-wrapper">
                <i class="material-icons" id="menu-cancel">close</i>
            </div>
        </a>

        <a href="index.php">
            <div>
                <div class="button-menu">
                    Home
                </div>
            </div>
        </a>
        <a href="gallery.php">
            <div>
                <div class="button-menu">
                    Fotos
                </div>
            </div>
        </a>
        <a href="software.php">
            <div>
                <div class="button-menu">
                    Software
                </div>
            </div>
        </a>
    </div>
</nav>

<div class="NotificationAlert" id="cookie-modal">
    <p>Diese Webseite nutzt Cookies, welche aus Gründen der Webanalyse, Reichweitenmessung, Sicherheit und Optimierung
        der Nutzererfahrung erforderlich sind. Ihre Cookie-Präferenzen können Sie in den Einstellungen Ihres Browsers
        ändern. Weitere Informationen dazu finden Sie auch in der <a target="_blank" href="privacy-policy.php">Datenschutzerklärung</a>.
    </p>
    <script>
        function closeCookieModal() {
            document.getElementById('cookie-modal').style.display = 'none';
            sessionStorage.setItem('cookieConsent', 'true');
        }
    </script>
    <a href="javascript:void(0)" onclick="closeCookieModal()">
        <div class="button-primary button-content button-no-icon">OK!</div>
    </a>
</div>

<script>
    if (sessionStorage.getItem('cookieConsent') === 'true') {
        document.getElementById('cookie-modal').style.display = 'none';
    }
</script>