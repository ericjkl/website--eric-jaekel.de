<!DOCTYPE html>

<html lang="de-de" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Die besten Fotos des Planeten!</title>
    <meta name="description" content="Alle Fotos von Eric Jäkel (die Besten der Welt) sind hier zu finden." />
    <?php include 'IncludedContent/head.php';?>
</head>
<body>
    
<?php
function outputCardsAuto($directory_path) {
    $all_files = scandir($directory_path); //Ordner auslesen
    foreach ($all_files as $file) { //Ausgabe
        $file_extension = strtolower(pathinfo($file, PATHINFO_EXTENSION)); //Dateiendung
        $file_filename = pathinfo($file, PATHINFO_FILENAME); //Dateiname (ohne Endung)
        if ($file_extension == "jpg") { // nur JPEGs
            // Thumbnail
            $thumbnail_check = file_exists($directory_path."thumbnails/thumbnail-".$file_filename.".".$file_extension);
            if ($thumbnail_check == true) {
                $thumbnail_path = $directory_path."thumbnails/thumbnail-".$file_filename.".".$file_extension;
                $thumbnail_class = "thumbnail";
                $thumbnail_tag = '<img class="masonry-img '.$thumbnail_class.'" src="'.$thumbnail_path.'" alt="Unfortunately, this image can not be displayed. :(">';
                $image_tag = '<img src="'.$directory_path.$file.'" style="display: none;" alt="Unfortunately, this image can not be displayed. :(">';
            } else {
                $thumbnail_path = $directory_path.$file;
                $thumbnail_class = "no-thumbnail";
                $thumbnail_tag = '<img class="masonry-img '.$thumbnail_class.'" src="'.$thumbnail_path.'" style="display: none;" alt="Unfortunately, this image can not be displayed. :(">';
                $image_tag = '<img src="'.$directory_path.$file.'" alt="Unfortunately, this image can not be displayed. :(">';
            }
            // Beschreibung ausgeben + verschiedene Fallback-Szenarien
            $file_check = file_exists($directory_path.$file_filename."-description.txt");
            if ($file_check == true) {
                $read = file($directory_path.$file_filename."-description.txt"); //Textdatei mit Beschreibung
                $fileContents_check = empty($read);
                if ($fileContents_check == false) { //prüfen ob Datei leer ist
                    $line1_length = strlen($read[0]); //Länge 1. Zeile
                    if ($line1_length < 60 && $line1_length > 1) {
                        $title = $read[0];
                        $text_tag = '<div class="masonry-text"><h5>'.$title.'</h5></div>';
                    } else {
                        $title = 'Kein Titel verfügbar.'; // Fallback, wenn Titel nicht zwischen 2 und 59 Zeichen
                        $text_tag = '';
                    }
                    $count = count($read); //Zeilen der Textdatei zählen (=Elemente des Arrays)
                    if ($count == 2) {
                        $description = $read[1];
                    } else {
                        $description = 'Keine Beschreibung verfügbar.';
                    }
                } else {
                    $title = 'Kein Titel verfügbar.';
                    $description = 'Keine Beschreibung verfügbar.';
                    $text_tag = '';
                }                
            } else {
                $title = 'Kein Titel verfügbar.';
                $description = 'Keine Beschreibung verfügbar.';
                $text_tag = '';
            }
            echo    '<div class="masonry-item">
                        <a href="#full-image-'.$file.'" onclick="disableScrolling()">
                            <img class="masonry-img" src="'.$thumbnail_path.'" alt="Beim Anzeigen dieses Bildes ist leider ein Fehler aufgetreten. :(("/>
                        </a>
                        '.$text_tag.'
                    </div>
                    <a href="javascript:history.back()" class="JesterBox" onclick="resetScrolling()">
                        <div id="full-image-'.$file.'">
                            <img src="'.$directory_path.$file.'" alt="Beim Anzeigen dieses Bildes ist leider ein Fehler aufgetreten. :((">
                        </div>
                    </a>';
        }        
    }
}

function outputCardsManually(...$all_filepaths) {
    foreach ($all_filepaths as $filepath) { //Ausgabe
        $file_extension = strtolower(pathinfo($filepath, PATHINFO_EXTENSION)); //Dateiendung
        $file_filename = pathinfo($filepath, PATHINFO_FILENAME); //Dateiname (ohne Endung)
        $directory_path_missing_slash = pathinfo($filepath, PATHINFO_DIRNAME); //Ordner ohne letzten /
        $directory_path = $directory_path_missing_slash.'/'; //Ordner mit / am Ende
        if ($file_extension == "jpg") { // nur JPEGs
            // Thumbnail
            $thumbnail_check = file_exists($directory_path."thumbnails/thumbnail-".$file_filename.".".$file_extension);
            if ($thumbnail_check == true) {
                $thumbnail_path = $directory_path."thumbnails/thumbnail-".$file_filename.".".$file_extension;
                $thumbnail_class = "thumbnail";
            } else {
                $thumbnail_path = $directory_path.$file_filename.".".$file_extension;
                $thumbnail_class = "no-thumbnail";
            }
            // Beschreibung ausgeben + verschiedene Fallback-Szenarien
            $file_check = file_exists($directory_path.$file_filename."-description.txt");
            if ($file_check == true) {
                $read = file($directory_path.$file_filename."-description.txt"); //Textdatei mit Beschreibung
                $fileContents_check = empty($read);
                if ($fileContents_check == false) { //prüfen ob Datei leer ist
                    $line1_length = strlen($read[0]); //Länge 1. Zeile
                    if ($line1_length < 60 && $line1_length > 1) {
                        $title = $read[0];
                        $text_tag = '<div class="masonry-text"><h5>'.$title.'</h5></div>';
                    } else {
                        $title = 'Kein Titel verfügbar.'; // Fallback, wenn Titel nicht zwischen 2 und 59 Zeichen
                        $text_tag = "";
                    }
                    $count = count($read); //Zeilen der Textdatei zählen (=Elemente des Arrays)
                    if ($count == 2) {
                        $description = $read[1];
                    } else {
                        $description = 'Keine Beschreibung verfügbar.';
                        $text_tag = "";
                    }
                } else {
                    $title = 'Kein Titel verfügbar.';
                    $description = 'Keine Beschreibung verfügbar.';
                    $text_tag = "";
                }                
            } else {
                $title = 'Kein Titel verfügbar.';
                $description = 'Keine Beschreibung verfügbar.';
                $text_tag = "";
            }
            echo    '<div class="masonry-item">
                        <a href="#full-image-'.$file_filename.'.'.$file_extension.'" onclick="disableScrolling()">
                            <img class="masonry-img" src="'.$thumbnail_path.'" alt="Beim Anzeigen dieses Bildes ist leider ein Fehler aufgetreten. :(("/>
                        </a>
                        '.$text_tag.'
                    </div>
                    <a href="javascript:history.back()" class="JesterBox" onclick="resetScrolling()">
                        <div id="full-image-'.$file_filename.'.'.$file_extension.'">
                            <img src="'.$directory_path.$file_filename.".".$file_extension.'" alt="Beim Anzeigen dieses Bildes ist leider ein Fehler aufgetreten. :((">
                        </div>
                    </a>';
        }        
    }
}
?>
    

    <div class="parallax-container" id="parallax-gallery">
        <h1>Fotos</h1>
    </div>

    <div class="ContentBox-gallery">

        <?php include 'IncludedContent/menu.php'; ?>

        <div>
            <div class="imageContainerHead" >
                <h3>Highlights</h3>
                <i class="material-icons" id="ic_expand_less_1" onclick="open_close_imageContainer(this.id)">expand_less</i>
                <i class="material-icons" id="ic_expand_more_1" onclick="open_close_imageContainer(this.id)" style="display: none;">expand_more</i>
            </div>

            <div class="cards-container-nobootstrap" id="imageContainer1">
                <ul class="custom-masonry-image-list">
                    <?php 
                    outputCardsManually('sources/images/landscapes/009landscapes.jpg',
                        'sources/images/macro/001macro.jpg',
                        'sources/images/macro/002macro.jpg',
                        'sources/images/other/003other.jpg',
                        'sources/images/landscapes/DSC03543-10.jpg',
                        'sources/images/landscapes/DSC06286.jpg',
                        'sources/images/landscapes/DSC06745-9--AFPPRT-HQ.jpg',
                        'sources/images/landscapes/DSC07418-HDR.jpg',
                        'sources/images/landscapes/DSC-07333-4-5--AFPHDR-HQ.jpg',
                        'sources/images/landscapes/DSC07659-AFPORG-HQ.jpg',
                        'sources/images/landscapes/DSC07664-Bearbeitet.jpg',
                        'sources/images/landscapes/DSC07776-Bearbeitet.jpg',
                        'sources/images/landscapes/DSC08118-HDR-Bearbeitet.jpg',
                        'sources/images/macro/025macro.jpg',
                        'sources/images/macro/023macro.jpg',
                        'sources/images/macro/028macro.jpg',
                        'sources/images/other/DSC08154.jpg',
                        'sources/images/other/DSC06087.jpg');
                    ?>
                </ul>
            </div>
        </div>

        <div>
            <div class="imageContainerHead" >
                <h3>Sortiert nach Rubriken</h3>
                <i class="material-icons" id="ic_expand_less_2" onclick="open_close_imageContainer(this.id)" style="display: none;">expand_less</i>
                <i class="material-icons" id="ic_expand_more_2" onclick="open_close_imageContainer(this.id)">expand_more</i>
            </div>
            
            <div class="cards-container-nobootstrap" id="imageContainer2" style="display: none;">

                <h4>Landschaften</h4>
                <ul class="custom-masonry-image-list">
                    <?php
                    outputCardsAuto("../sources/images/landscapes/");
                    ?>
                </ul>
                

                <h4>Makro</h4>
                <ul class="custom-masonry-image-list">
                    <?php
                    outputCardsAuto("../sources/images/macro/");
                    ?>
                </ul>

                <h4>Anderes</h4>
                <ul class="custom-masonry-image-list">
                    <?php
                    outputCardsAuto("../sources/images/other/");
                    ?>
                </ul>

                <h4>Tiere</h4>
                <ul class="custom-masonry-image-list">
                    <?php
                    outputCardsAuto("../sources/images/animals/");
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