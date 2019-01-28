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
}