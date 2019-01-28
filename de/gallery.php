<!DOCTYPE html>

<html lang="de-de" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Die besten Fotos des Planeten!</title>
    <meta name="description" content="Alle Fotos von Eric Jäkel (die Besten der Welt) sind hier zu finden."/>
    <?php include 'IncludedContent/head.php'; ?>
</head>
<body>

<?php
include '../static/OutputImages.php';
$output_images = new OutputImages();
?>


<div class="parallax-container" id="parallax-gallery">
    <h1>Fotos</h1>
</div>

<div>
    <?php include 'IncludedContent/menu.php'; ?>

    <div>
        <a href="javascript:void(0)" onclick="showHideElem('imageContainer1', 'ic_expand_more_1', 'ic_expand_less_1')">
            <div class="imageContainerHead">
                <h3>Highlights</h3>
                <i class="material-icons" id="ic_expand_less_1" >expand_less</i>
                <i class="material-icons" id="ic_expand_more_1"
                   style="display: none;">expand_more</i>
            </div>
        </a>


        <div id="imageContainer1">
            <ul class="custom-masonry-image-list">
                <?php
                $output_images->outputCardsAuto('de',
                    '../sources/images/landscapes/009landscapes.jpg',
                    '../sources/images/macro/001macro.jpg', '../sources/images/macro/002macro.jpg',
                    '../sources/images/other/003other.jpg', '../sources/images/landscapes/DSC03543-10.jpg',
                    '../sources/images/landscapes/DSC06286.jpg',
                    '../sources/images/landscapes/DSC06745-9--AFPPRT-HQ.jpg',
                    '../sources/images/landscapes/DSC07418-HDR.jpg',
                    '../sources/images/landscapes/DSC-07333-4-5--AFPHDR-HQ.jpg',
                    '../sources/images/landscapes/DSC07659-AFPORG-HQ.jpg',
                    '../sources/images/landscapes/DSC07664-Bearbeitet.jpg',
                    '../sources/images/landscapes/DSC07776-Bearbeitet.jpg',
                    '../sources/images/landscapes/DSC08118-HDR-Bearbeitet.jpg', '../sources/images/macro/025macro.jpg',
                    '../sources/images/macro/023macro.jpg', '../sources/images/macro/028macro.jpg',
                    '../sources/images/other/DSC08154.jpg', '../sources/images/other/DSC06087.jpg');
                ?>
            </ul>
        </div>
    </div>

    <div>
        <a href="javascript:void(0)" onclick="showHideElem('imageContainer2', 'ic_expand_more_2', 'ic_expand_less_2')">
            <div class="imageContainerHead">
                <h3>Sortiert nach Rubriken</h3>
                <i class="material-icons" id="ic_expand_less_2"
                   style="display: none;">expand_less</i>
                <i class="material-icons" id="ic_expand_more_2"">expand_more</i>
            </div>
        </a>


        <div class="cards-container-nobootstrap" id="imageContainer2" style="display: none;">

            <h4>Landschaften</h4>
            <ul class="custom-masonry-image-list">
                <?php
                $output_images->outputCardsAuto('de',"../sources/images/landscapes/");
                ?>
            </ul>


            <h4>Makro</h4>
            <ul class="custom-masonry-image-list">
                <?php
                $output_images->outputCardsAuto('de',"../sources/images/macro/");
                ?>
            </ul>

            <h4>Anderes</h4>
            <ul class="custom-masonry-image-list">
                <?php
                $output_images->outputCardsAuto('de',"../sources/images/other/");
                ?>
            </ul>

            <h4>Tiere</h4>
            <ul class="custom-masonry-image-list">
                <?php
                $output_images->outputCardsAuto('de',"../sources/images/animals/");
                ?>
            </ul>

        </div>
    </div>
</div>

<?php
include 'IncludedContent/footer.php';
?>

</body>
</html>