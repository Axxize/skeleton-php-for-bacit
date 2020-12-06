<?php /*
$code = substr( password_hash( 'lagerenkodeja', PASSWORD_DEFAULT ), rand( 0,56 ), 4);
$my_img = @imagecreate(100, 35)
    or die("cannot initialize new GD image stream");
$background = imagecolorallocate( $my_img, 255, 0, 102 );
$text_colour = imagecolorallocate( $my_img, 0, 0, 0);
$line_colour = imagecolorallocate( $my_img, 0, 0, 0);

imagestring( $my_img, 5, 30, 10, $code, $text_colour );
//imagesetthickness ($my_img, 3 );
//imageline( $my_img, 0, 30, 100, 30, $line_colour );

header( "Content-type_ image/png" );
imagepng( $my_img ); */
?>
<?php
header("Content-Type: image/png");
$im = @imagecreate(110, 20)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 0, 0, 0);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5,  "A Simple Text String", $text_color);
imagepng($im);
imagedestroy($im);
?>