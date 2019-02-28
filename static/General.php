<?php
/**
 * Created by PhpStorm.
 * User: ericj
 * Date: 11.01.2019
 * Time: 20:37
 */

class General
{
    function html_console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

    function getImageDimensions($image_path) {
        $size = getimagesize($image_path);
        $height = $size[1];
        $width = $size[0];
        return array(
            'height' => $height,
            'width' => $width,
            'relative_height' => $height / $width,
            // width = 1, height = relative_height
            'relative_width' => $width / $height,
            // height = 1, width = relative_width
            'html_attribute' => 'data-relative-height="' . $height / $width . '"',
        );
    }
}