
<?php

//namespace ColorThief\Test;

use ColorThief\ColorThief;

// get most dominant color from image

$color = ColorThief::getColor( 'https://rawcdn.githack.com/nikkanetiya/laravel-color-palette/master/tests/images/strawberry.jpeg' );

// Color provides several getters/properties
echo $color;             // '#dc5550'
echo $color->rgbString;  // 'rgb(220,85,80)'
echo $color->rgbaString; // 'rgba(220,85,80,1)'
echo $color->int;        // 14439760
print_r($color->rgb);        // array(220, 85, 80) 
print_r($color->rgba);       // array(220, 85, 80, 1)