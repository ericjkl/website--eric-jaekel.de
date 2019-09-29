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

        $html_tags = array();

        switch ($language) {
            case 'de':
                foreach (array_keys($exif_data_new) as $exif_key) {
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
                    $html_tags[] = '<div class="exif-element ' . $exif_key . '">
                        ' . $html_content . '
                    </div>';
                }
                break;
            case 'en':
                foreach (array_keys($exif_data_new) as $exif_key) {
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
                    $html_tags[] = '<div class="exif-element ' . $exif_key . '">
                        ' . $html_content . '
                    </div>';
                }
                break;
            default:
                foreach (array_keys($exif_data_new) as $exif_key) {
                    $html_content = null;
                }
                break;
        }

        return $html_tags;
    }


    function createCard($language, $image_path)
    {
        if (!file_exists($image_path)) {
            return false;
        }
        $file_extension = strtolower(pathinfo($image_path, PATHINFO_EXTENSION)); //Dateiendung
        if ($file_extension != ("jpg" || "png" || "svg" || "gif")) {
            return false;
        }
        $file_filename = pathinfo($image_path, PATHINFO_FILENAME); //Dateiname (ohne Endung)
        $directory_path = pathinfo($image_path, PATHINFO_DIRNAME) . '/';

        // Thumbnail
        $thumbnail_path_standard_size = $directory_path . "thumbnails/thumbnail-" . $file_filename . "." . $file_extension;
        if (file_exists($thumbnail_path_standard_size)) {
            $thumbnail_path_standard_size_exists = true;
        } else {
            $thumbnail_path_standard_size_exists = false;
            $thumbnail_path_standard_size = $image_path;
        }

        $thumbnail_path_small_size = $directory_path . "thumbnails/thumbnail-small-" . $file_filename . "." . $file_extension;
        if (file_exists($thumbnail_path_small_size)) {
            $thumbnail_path_small_size_exists = true;
        } else if ($thumbnail_path_standard_size_exists) {
            $thumbnail_path_small_size = $thumbnail_path_standard_size;
            $thumbnail_path_small_size_exists = false;
        } else {
            $thumbnail_path_small_size = $image_path;
            $thumbnail_path_small_size_exists = false;
        }

        $thumbnail_path_extra_small_size = $directory_path . "thumbnails/thumbnail-extra-small-" . $file_filename . "." . $file_extension;
        if (file_exists($thumbnail_path_extra_small_size)) {
            null;
        } else if ($thumbnail_path_small_size_exists) {
            $thumbnail_path_extra_small_size = $thumbnail_path_small_size;
        } else if ($thumbnail_path_standard_size_exists) {
            $thumbnail_path_extra_small_size = $thumbnail_path_standard_size;
        } else {
            $thumbnail_path_extra_small_size = $image_path;
        }

        $exif_data = $this->outputExif($language, $image_path);
        $relative_height = $this->getImageDimensions($image_path)['relative_height'];

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

        echo(utf8_encode('
                        <div class="masonry-item">
                            <a href="#full-image-' . $file_filename . '.' . $file_extension . '">
                                <picture class="lazyload">
                                    <source srcset="../sources/images/preloader.svg" data-srcset="' . $thumbnail_path_extra_small_size . '" media="(max-width: 400px)"/>
                                    <source srcset="../sources/images/preloader.svg" data-srcset="' . $thumbnail_path_small_size . '" media="(max-width: 1000px)"/>
                                    <img src="../sources/images/preloader.svg" data-src="' . $thumbnail_path_standard_size . '" 
                                    class="masonry-img" alt="' . $image_error_message . '"
                                    data-relative-height="' . $relative_height . '"/>
                                </picture>                                
                            </a>
                        </div>
                        <a href="javascript:null" class="fullscreen-link" id="full-image-' . $file_filename . '.' . $file_extension . '">
                            <div class="fullscreen-container">
                                <div class="fullscreen-img">
                                    <picture class="lazyload" data-lazyload-listener="focus">
                                        <source srcset="../sources/images/preloader.svg" data-srcset="' . $thumbnail_path_standard_size . '" media="(max-width: 400px)"/>
                                        <source srcset="../sources/images/preloader.svg" data-srcset="' . $directory_path . $file_filename . "." . $file_extension . '" media="(max-width: 1000px)"/>
                                        <img src="../sources/images/preloader.svg" data-src="' . $directory_path . $file_filename . "." . $file_extension . '" alt="' . $image_error_message . '">
                                    </picture>
                                </div>
                                <button onclick="showPreviousImage(this.parentElement.parentElement)">
                                    <div class="fullscreen-icon fullscreen-icon-prev">
                                        <i class="material-icons">
                                        navigate_before
                                        </i>
                                    </div>
                                </button>
                                
                                <button onclick="showNextImage(this.parentElement.parentElement)">
                                    <div class="fullscreen-icon fullscreen-icon-next">
                                        <i class="material-icons">
                                        navigate_next
                                        </i>
                                    </div>
                                </button>
                                
                                <button onclick="closeFullscreen()">
                                    <div class="fullscreen-icon fullscreen-icon-close">
                                        <i class="material-icons">
                                        close
                                        </i>
                                    </div>
                                </button>
                                
                                <button onclick="this.parentElement.scrollTo(0,this.parentElement.scrollHeight)">
                                    <div class="fullscreen-icon fullscreen-icon-scroll-bottom">
                                        <i class="material-icons">
                                        arrow_drop_down_circle
                                        </i>
                                    </div>
                                </button>
                                <div class="fullscreen-information">
                                    ' . implode($exif_data) . '
                                </div>
                            </div>
                        </a>'));
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