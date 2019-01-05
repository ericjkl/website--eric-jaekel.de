<!DOCTYPE html>

<html lang="de-de" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Die besten Fotos des Planeten!</title>
    <meta name="description" content="Alle Fotos von Eric Jäkel (die Besten der Welt) sind hier zu finden."/>
    <?php include 'IncludedContent/head.php'; ?>
</head>
<body>

<?php

/**
 * @param $path
 * @return void
 */
function outputExif($path)
{
    $exif_data = exif_read_data($path);
//    print_r($exif_data);
    $exif_wanted_vars_all = array('FileDateTime'          => 'FileDateTime',
                                  'DateTime'              => 'DateTime',
                                  'DateTimeOriginal'      => 'DateTimeOriginal',
                                  'Artist'                => 'Artist',
                                  'ImageDescription'      => 'ImageDescription',
                                  'ApertureFNumber'       => 'ApertureFNumber',
                                  'ExposureTime'          => 'ExposureTime',
                                  'ISOSpeedRatings'       => 'ISOSpeedRatings',
                                  'FocalLengthIn35mmFilm' => 'FocalLengthIn35mmFilm',
                                  'COMPUTED'              => array('UserComment'     => 'UserComment',
                                                                   'ApertureFNumber' => 'ApertureFNumber',
                                  )
    );
    $exif_data_new = array();

    foreach ($exif_wanted_vars_all as $exif_wanted_var_1stLevel) {
        if (is_array($exif_wanted_var_1stLevel)) {
            foreach ($exif_wanted_var_1stLevel as $exif_wanted_var_2ndLevel) {
                if (in_array($exif_wanted_var_2ndLevel, $exif_data)) {
                    echo $exif_wanted_var_2ndLevel;
                    print_r($exif_wanted_var_1stLevel);
                    $exif_data_new[$exif_wanted_var_2ndLevel] = $exif_data[$exif_wanted_var_1stLevel][$exif_wanted_var_2ndLevel];
                }
            }
        } elseif (isset($exif_data[$exif_wanted_var_1stLevel])) {
            $exif_data_new[$exif_wanted_var_1stLevel] = $exif_data[$exif_wanted_var_1stLevel];
        }
//        if (isset($exif_data[$exif_wanted_var_1stLevel])) {
//            if (gettype($exif_wanted_var_1stLevel) == 'array') {
//
//                foreach ($exif_wanted_var_1stLevel as $exif_wanted_var_2ndLevel) {
//                    if (!empty($exif_wanted_var_2ndLevel)) {
//                        $exif_wanted_vars_all[$exif_wanted_var_2ndLevel] = $exif_data[$exif_wanted_var_1stLevel][$exif_wanted_var_2ndLevel];
//                    } else {
//                        unset($exif_wanted_vars_all[$exif_wanted_var_1stLevel][$exif_wanted_var_2ndLevel]);
//                    }
//                }
//
//            } else {
//                $exif_wanted_vars_all = $exif_data[$exif_wanted_var_1stLevel];
//            }
//        } else {
//            unset($exif_wanted_vars_all[$exif_wanted_var_1stLevel]);
//        }
    }

    //manually echo if position of $exif_wanted_var_1stLevel would be 2 or more dimensional
//    if (isset($exif_data['COMPUTED']['UserComment'])) {
//        $exif_wanted_vars_all[] = '<div class="exif-element exif-description">Bildunterschrift: ' . $exif_data['COMPUTED']['UserComment'] . '</div>';
//    }
//    if (isset($exif_data['COMPUTED']['ApertureFNumber'])) {
//        $exif_wanted_vars_all[] = '<div class="exif-element exif-description">Blende: ' . $exif_data['COMPUTED']['ApertureFNumber'] . '</div>';
//    }

    foreach (array_keys($exif_data_new) as $exif_key) {
        switch ($exif_key) {
            case 'DateTimeOriginal':
                $date = date_create_from_format('Y:m:d H:i:s', $exif_data_new[$exif_key]);
                $html_content = 'Datum: ' . date_format($date, 'd.m.Y');
                if (isset($exif_data_new['FileDateTime'])) {
                    unset($exif_data['FileDateTime']);
                }
                if (isset($exif_data_new['DateTime'])) {
                    unset($exif_data_new['DateTime']);
                }
                break;
            case 'DateTime':
                $date = date_create_from_format('Y:m:d H:i:s', $exif_data_new[$exif_key]);
                $html_content = 'Datum: ' . date_format($date, 'd.m.Y');
                if (isset($exif_data_new['FileDateTime'])) {
                    unset($exif_data_new['FileDateTime']);
                }
                break;
            case 'FileDateTime':
                $html_content = 'Datum: ' . date("d.m.Y", $exif_data_new[$exif_key]);
                break;
            case 'Artist':
                $html_content = 'Fotograf: ' . $exif_data_new[$exif_key];
                break;
            case 'ImageDescription':
                $html_content = 'Bildbeschreibung: ' . $exif_data_new[$exif_key];
                break;
            case 'ExposureTime':
                $html_content = 'Belichtungszeit: ' . $exif_data_new[$exif_key];
                break;
            case 'ISOSpeedRatings':
                $html_content = 'ISO: ' . $exif_data_new[$exif_key];
                break;
            case 'FocalLengthIn35mmFilm':
                $html_content = 'Brennweite: ' . $exif_data_new[$exif_key];
                break;
            case 'UserComment':
                $html_content = 'Bildunterschrift: ' . $exif_data_new[$exif_key];
                break;
            case 'ApertureFNumber':
                $html_content = 'Blende: ' . $exif_data_new[$exif_key];
                break;
            default:
                $html_content = false;
                break;
        }

        $exif_data_new[$exif_key] = '<div class="exif-element ' . $exif_data_new[$exif_key] . '">
                    ' . $html_content . '
                </div>';

    }

    foreach ($exif_data_new as $exif_html_element) {
        echo utf8_encode($exif_html_element);
    }
}


function createCard($image_path)
{
    if (file_exists($image_path)) {
        $file_extension = strtolower(pathinfo($image_path, PATHINFO_EXTENSION)); //Dateiendung
        $file_filename = pathinfo($image_path, PATHINFO_FILENAME); //Dateiname (ohne Endung)
        $directory_path = pathinfo($image_path, PATHINFO_DIRNAME) . '/';
        if ($file_extension == ("jpg" || "png" || "svg" || "gif")) {
            // Thumbnail
            $thumbnail_path = $directory_path . "thumbnails/thumbnail-" . $file_filename . "." . $file_extension;
            file_exists($thumbnail_path) ? null : $thumbnail_path = $image_path;

            echo '<div class="masonry-item">
                        <a href="#full-image-' . $file_filename . '.' . $file_extension . '" onclick="disableScrolling()">
                            <img class="masonry-img" src="' . $thumbnail_path . '" alt="Beim Anzeigen dieses Bildes ist leider ein Fehler aufgetreten. :(("/>
                        </a>
                    </div>
                    <a href="javascript:history.back()" class="JesterBox" onclick="resetScrolling()">
                        <div id="full-image-' . $file_filename . '.' . $file_extension . '">
                            <img src="' . $directory_path . $file_filename . "." . $file_extension . '" alt="Beim Anzeigen dieses Bildes ist leider ein Fehler aufgetreten. :((">
                        </div>
                    </a>';

            outputExif($image_path);
        }
    } else {
        return false;
    }
}


function outputCardsAuto(...$file_elements)
{
    foreach ($file_elements as $file_element) {
//        check if directory or file path
        $file_element_extension = pathinfo($file_element, PATHINFO_EXTENSION);
        if ($file_element_extension == ("" || NULL) || gettype($file_element_extension) == 'NULL') {
            if (file_exists($file_element)) {
                $file_element_subfiles = scandir($file_element);
                foreach ($file_element_subfiles as $file_element_subfile) {
                    createCard($file_element . $file_element_subfile);
                }
            }
        } else {
            createCard($file_element);
        }
    }
}

?>


<div class="parallax-container" id="parallax-gallery">
    <h1>Fotos</h1>
</div>

<div>
    <?php include 'IncludedContent/menu.php'; ?>

    <div>
        <div class="imageContainerHead">
            <h3>Highlights</h3>
            <i class="material-icons" id="ic_expand_less_1" onclick="open_close_imageContainer(this.id)">expand_less</i>
            <i class="material-icons" id="ic_expand_more_1" onclick="open_close_imageContainer(this.id)"
               style="display: none;">expand_more</i>
        </div>

        <div id="imageContainer1">
            <ul class="custom-masonry-image-list">
                <?php
                outputCardsAuto('../sources/images/landscapes/009landscapes.jpg',
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
        <div class="imageContainerHead">
            <h3>Sortiert nach Rubriken</h3>
            <i class="material-icons" id="ic_expand_less_2" onclick="open_close_imageContainer(this.id)"
               style="display: none;">expand_less</i>
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