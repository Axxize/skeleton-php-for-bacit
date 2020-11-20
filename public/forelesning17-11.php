<?php
$code = substr( password_hash( 'lagerenkodeja', PASSWORD_DEFAULT ), rand( 0,56 ), 4);
$my_img = imagecreate( 100, 35 );
$background = imagecolorallocate( $my_img, 255, 0, 102 );
$text_colour = imagecolorallocate( $my_img, 0, 0, 0);
$line_colour = imagecolorallocate( $my_img, 0, 0, 0);

imagestring( $my_img, 5, 30, 10, $code, $text_colour );
//imagesetthickness ($my_img, 3 );
//imageline( $my_img, 0, 30, 100, 30, $line_colour );

header( "Content-type_ image/png" );
imagepng( $my_img );
