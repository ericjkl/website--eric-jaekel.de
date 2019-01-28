<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Eric Jäkel - Photographer from Leipzig</title>
    <meta name="description"
          content="If you are looking for a photographer in the area of Leipzig, this is the website to click on! Plus, you can explore my photos of landscapes, macros, stars, action, events and much more."/>

    <?php include 'IncludedContent/head.php'; ?>

</head>
<body>

<div class="parallax-container" id="parallax-index">
    <h1>Eric Jäkel</h1>
    <p>Photographer. Webdesigner. Software developer.</p>
</div>

<div class="ContentBox">

    <?php include 'IncludedContent/menu.php'; ?>

    <section>
        <img src="../sources/images/landscapes/DSC07282.jpg" id="firstimgIndex"
             alt="Dieses Bild kann leider nicht angezeigt werden. :("/>
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
        <img src="/sources/images/landscapes/009landscapes.jpg"
             alt="Landschaft / Dieses Bild kann leider nicht angezeigt werden. :("/>
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
        <img src="/sources/images/landscapes/DSC07654.jpg"
             alt="Gletscherwanderung / Dieses Bild kann leider nicht angezeigt werden. :("/>
        <div>
            <h2>Sport, Action &amp; Events</h2>
            <p>
                Additionally, I am an event photographer and freeze moments
                full of action and energy.
            </p>
        </div>
    </section>

    <section>
        <img src="/sources/images/other/003other.jpg"
             alt="Sternenhimmel / Dieses Bild kann leider nicht angezeigt werden. :("/>
        <div>
            <h2>Everything else</h2>
            <p>
                There are a lot more things I like to photograph e. g. nightscapes, animals and urban
                motives.
            </p>
        </div>
    </section>


    <div class="bigButton">
        <a href="/de/gallery.php">
            <div class="center-vertical bigButton-text">
                <h3>To gallery</h3>
            </div>
            <div class="center-vertical bigButton-icon">
                <i class="material-icons">arrow_forward</i>
            </div>
        </a>
    </div>

    <div class="jumbotron shadow  bg-transparent jumbotron-nobootstrap">
        <h1>Interested?</h1>
        <h4 class="text-dark">You are interested in my photos and
            would like to book me? Here are your advantages:</h4>
        <hr class="my-4 text-light">

        <div class="cards-container-nobootstrap">
            <div class="card shadow-sm bg-light card-nobootstrap">
                <img class="card-img-top mx-auto card-icon-nobootstrap" src="/sources/images/icon-nomoney.svg"
                     alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">All free</h4>
                    <p class="card-text">Yes, that's right! If you book me as your photographer, you will not
                        be charged a penny. Since I am still a quite young and inexperienced
                        photographer, I think of every assignment as a chance to gather
                        experience and to enhance my skills. If you are happy in the end plus you like
                        my pictures, I will be delighted with a donation.</p>
                </div>
            </div>

            <div class="card shadow-sm bg-light card-nobootstrap">
                <img class="card-img-top mx-auto card-icon-nobootstrap" src="/sources/images/icon-flexibility.svg"
                     alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">Much flexibility</h4>
                    <p class="card-text">I take photos of every kind - whether at a party, at sporting events,
                        other celebrations or at a portrait shooting. You have got certain thoughts
                        or rely on my creativity - no problem at all.</p>
                </div>
            </div>
        </div>

        <a class="btn btn-primary btn-lg btn-block" href="contact.php">Contact me</a>
    </div>

    <div class="jumbotron shadow-sm bg-dark jumbotron-nobootstrap">
        <h1 class="text-light">Delighted?</h1>
        <h4 class="text-light">Read how you can support me</h4>
        <hr class="border-danger">
        <p class="text-light">You love my pictures and would like to support me? Then I am absolutely happy
            about a donation. In this way you help me a lot with improving my work, finding
            new motivation and most importantly earning a part of a living. Please also
            keep in mind, that, as a student, I depend on external support.</p>
        <a class="btn btn-danger btn-lg btn-nob-addmargin" href="https://www.patreon.com/join/ericjkl">Donate now</a>
        <a class="btn btn-outline-light btn-lg btn-nob-addmargin" href="contact.php">Contact me</a>
        <div class="alert alert-secondary bg-dark text-secondary" role="alert">
            Note: By clicking on the button "Donate now" you are getting redirected
            to the platform Patreon, over which the donation procedure is being processed.
            Here you can find some <a href="https://support.patreon.com/hc/en-us" class="alert-link text-white-50 allow-decoration">
                more information on Patreon</a>. If there are still pending questions, feel
            free to write a message to me.
        </div>
    </div>
</div>


<?php
include 'IncludedContent/footer.php';
?>

</body>
</html>