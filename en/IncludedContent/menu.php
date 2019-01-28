<div id="nav-icons">
    <a href="javascript:void(0)" onclick="showHideElem('nav-menu', 'nav-icons')">
        <i class="material-icons">menu</i>
    </a>
    <a href="#top">
        <i class="material-icons">arrow_upward</i>
    </a>
</div>


<nav>
    <div class="menuContainer" id="nav-menu" data-display="flex">
        <a href="javascript:void(0)" onclick="showHideElem('nav-menu', 'nav-icons')">
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
                    Photos
                </div>
            </div>

        </a>
        <a href="software.php">
            <di>
                <div class="button-menu">
                    Software
                </div>
            </di>

        </a>
    </div>
</nav>

<div class="NotificationAlert" id="cookie-modal">
    <p>This website uses cookies, which are necessary due to web analysis, reach measurements, security regards
        and user experience optimization. You can change your cookie preferences in the settings of your browser.
        You find more on that in the <a target="_blank" href="privacy-policy.php">privacy policy</a>.</p>
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