<?php
/**
 * Created by PhpStorm.
 * User: ericj
 * Date: 06.01.2019
 * Time: 17:29
 */
include 'General.php';

class OutputImages extends General
{

    function outputExif($language, $path)
    {
        $exif_data = exif_read_data($path);
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
                    foreach ($exif_data as $element_original_1stLevel) {
                        if (is_array($element_original_1stLevel)) {
                            if (array_key_exists($exif_wanted_var_2ndLevel, $element_original_1stLevel)) {
                                $exif_data_new[$exif_wanted_var_2ndLevel] = $element_original_1stLevel[$exif_wanted_var_2ndLevel];
                            }
                        }
                    }
                }
            } elseif (isset($exif_data[$exif_wanted_var_1stLevel])) {
                $exif_data_new[$exif_wanted_var_1stLevel] = $exif_data[$exif_wanted_var_1stLevel];
            }
        }

        foreach (array_keys($exif_data_new) as $exif_key) {
            switch ($language) {
                case 'de':
                    switch ($exif_key) {
                        case 'DateTimeOriginal':
                            $date = date_create_from_format('Y:m:d H:i:s', $exif_data_new[$exif_key]);
                            $html_content = 'Datum: ' . date_format($date, 'd.m.Y');
                            if (isset($exif_data_new['FileDateTime'])) {
                                unset($exif_data_new['FileDateTime']);
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
                            $html_content = 'Titel: ' . $exif_data_new[$exif_key];
                            break;
                        case 'ExposureTime':
                            $html_content = 'Belichtungszeit: ' . $exif_data_new[$exif_key] . 's';
                            break;
                        case 'ISOSpeedRatings':
                            $html_content = 'ISO: ' . $exif_data_new[$exif_key];
                            break;
                        case 'FocalLengthIn35mmFilm':
                            $html_content = 'Brennweite: ' . round($exif_data_new[$exif_key] / 1.5) . 'mm';
                            break;
                        case 'UserComment':
                            $html_content = 'Beschreibung: ' . $exif_data_new[$exif_key];
                            break;
                        case 'ApertureFNumber':
                            $html_content = 'Blende: ' . $exif_data_new[$exif_key];
                            break;
                        default:
                            $html_content = $exif_data_new[$exif_key];
                            break;
                    }
                    break;
                case 'en':
                    switch ($exif_key) {
                        case 'DateTimeOriginal':
                            $date = date_create_from_format('Y:m:d H:i:s', $exif_data_new[$exif_key]);
                            $html_content = 'Date: ' . date_format($date, 'd.m.Y');
                            if (isset($exif_data_new['FileDateTime'])) {
                                unset($exif_data_new['FileDateTime']);
                            }
                            if (isset($exif_data_new['DateTime'])) {
                                unset($exif_data_new['DateTime']);
                            }
                            break;
                        case 'DateTime':
                            $date = date_create_from_format('Y:m:d H:i:s', $exif_data_new[$exif_key]);
                            $html_content = 'Date: ' . date_format($date, 'd.m.Y');
                            if (isset($exif_data_new['FileDateTime'])) {
                                unset($exif_data_new['FileDateTime']);
                            }
                            break;
                        case 'FileDateTime':
                            $html_content = 'Date: ' . date("d.m.Y", $exif_data_new[$exif_key]);
                            break;
                        case 'Artist':
                            $html_content = 'Photographer: ' . $exif_data_new[$exif_key];
                            break;
                        case 'ImageDescription':
                            $html_content = 'Title: ' . $exif_data_new[$exif_key];
                            break;
                        case 'ExposureTime':
                            $html_content = 'Exposure time: ' . $exif_data_new[$exif_key] . 's';
                            break;
                        case 'ISOSpeedRatings':
                            $html_content = 'ISO: ' . $exif_data_new[$exif_key];
                            break;
                        case 'FocalLengthIn35mmFilm':
                            $html_content = 'Focal Length: ' . round($exif_data_new[$exif_key] / 1.5) . 'mm';
                            break;
                        case 'UserComment':
                            $html_content = 'Description: ' . $exif_data_new[$exif_key];
                            break;
                        case 'ApertureFNumber':
                            $html_content = 'Aperture: ' . $exif_data_new[$exif_key];
                            break;
                        default:
                            $html_content = $exif_data_new[$exif_key];
                            break;
                    }
                    break;
                default:
                    $html_content = null;
            }

            $exif_data_new[$exif_key] =
                '<div class="exif-element ' . $exif_key . '">
                    ' . $html_content . '
                </div>';

        }
        foreach ($exif_data_new as $exif_html_element) {
            return utf8_encode($exif_html_element);
        }
    }


    function createCard($language, $image_path)
    {
        if (file_exists($image_path)) {
            $file_extension = strtolower(pathinfo($image_path, PATHINFO_EXTENSION)); //Dateiendung
            $file_filename = pathinfo($image_path, PATHINFO_FILENAME); //Dateiname (ohne Endung)
            $directory_path = pathinfo($image_path, PATHINFO_DIRNAME) . '/';
            if ($file_extension == ("jpg" || "png" || "svg" || "gif")) {
                // Thumbnail
                $thumbnail_path = $directory_path . "thumbnails/thumbnail-" . $file_filename . "." . $file_extension;
                file_exists($thumbnail_path) ? null : $thumbnail_path = $image_path;

                $exif_data = $this->outputExif($language, $image_path);

                switch ($language) {
                    case 'de':
                        $image_error_message = 'Beim Anzeigen dieses Bildes ist leider ein Fehler aufgetreten. :((';
                        break;
                    case 'en':
                        $image_error_message = 'Unfortunately there was an error while displaying this picture. :((';
                        break;
                    default:
                        $image_error_message = null;
                }

                echo '
                        <div class="masonry-item">
                            <a href="#full-image-' . $file_filename . '.' . $file_extension . '">
                                <img class="masonry-img" src="' . $thumbnail_path . '" alt="'. $image_error_message .'"/>
                            </a>
                        </div>
                        <a href="javascript:history.back()" class="fullscreen-link" id="full-image-' . $file_filename . '.' . $file_extension . '">
                            <div class="fullscreen-container">
                                <div class="fullscreen-img">
                                    <img src="' . $directory_path . $file_filename . "." . $file_extension . '" alt="'. $image_error_message .'">
                                </div>
                                <div class="fullscreen-information">
                                    ' . $exif_data . '
                                </div>
                            </div>
                        </a>';
            }
        } else {
            return false;
        }
    }


    function outputCardsAuto($language, ...$file_elements)
    {
        if (!($language == ('de' || 'en'))) {
            return false;
        }
        foreach ($file_elements as $file_element) {
//        check if directory or file path
            $file_element_extension = pathinfo($file_element, PATHINFO_EXTENSION);
            if ($file_element_extension == ("" || NULL) || gettype($file_element_extension) == 'NULL') {
                if (file_exists($file_element)) {
                    $file_element_subfiles = scandir($file_element);
                    foreach ($file_element_subfiles as $file_element_subfile) {
                        $this->createCard($language, $file_element . $file_element_subfile);
                    }
                }
            } else {
                $this->createCard($language, $file_element);
            }
        }
    }
}