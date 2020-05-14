<?php
print_r('list cores rgbs<br>');
$hex = "#ff9900";
list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
echo "$hex -> $r $g $b";

print_r('<br><hr><br>Você pode usar a função hexdec (hexStr: String) para obter o valor decimal de uma sequência hexadecimal.<br>');
print_r('You can use the function hexdec(hexStr: String) to get the decimal value of a hexadecimal string.<br>');

$split = str_split("ffffff", 2);
$r = hexdec($split[0]);
$g = hexdec($split[1]);
$b = hexdec($split[2]);
echo "rgb(" . $r . ", " . $g . ", " . $b . ")";

print_r('<br><hr>');
list($r, $g, $b) = sscanf("#7bde84", "#%02x%02x%02x");
echo "rgb(" . $r . ", " . $g . ", " . $b . ")";

print_r('<br><hr>');
$color = '#ffffff';
$hex = str_replace('#','', $color);
if(strlen($hex) == 3):
   $rgbArray['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
   $rgbArray['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
   $rgbArray['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
else:
   $rgbArray['r'] = hexdec(substr($hex,0,2));
   $rgbArray['g'] = hexdec(substr($hex,2,2));
   $rgbArray['b'] = hexdec(substr($hex,4,2));
endif;

print_r($rgbArray);

print_r('<br><hr>');
//if u want to convert rgb to hex
$color='254,125,1';
$rgbarr=explode(",", $color);
echo sprintf("#%02x%02x%02x", $rgbarr[0], $rgbarr[1], $rgbarr[2]);

// define o fundo como vermelho
$background = imagecolorallocate($im, 255, 0, 0);

// define algumas cores
$white = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);

// do jeito hexadecimal
$white = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
$black = imagecolorallocate($im, 0x00, 0x00, 0x00);

print_r('<br><hr>');

$cor = "#c1c2b4";
//Check for a hex color string '#c1c2b4'
if(preg_match('/^#[a-f0-9]{6}$/i', $cor)) //hex color is valid
{
    //Verified hex color
    echo "teste: ";
    print_r($cor);
} 
 
//Check for a hex color string without hash 'c1c2b4'
elseif(preg_match('/^[a-f0-9]{6}$/i', $cor)) //hex color is valid
{
    $fix_color = '#' . $cor;
    print_r($fix_color);
}

print_r('<br><hr>');
// You would then compare $distance_squared to the square of the threshold. The factors may be adjusted (especially blue might get a higher factor), as well as their sum (in order to match the threshold)


$dr = $red1   - $red2;
$dg = $green1 - $green2;
$db = $blue1  - $blue2;
$fr = 2; // may be adjusted
$fg = 4; // "
$fb = 1; // "
$distance_squared = $fr * $dr * $dr + $fg * $dg * $dg + $fb * $db * $db;

print_r('<br><hr>');
// Start with an image and convert it to a palette-based image
$im = imagecreatefrompng('figures/imagecolorclosest.png');
imagetruecolortopalette($im, false, 255);

// Search colors (RGB)
$colors = array(
    array(254, 145, 154),
    array(153, 145, 188),
    array(153, 90, 145),
    array(255, 137, 92)
);

// Loop through each search and find the closest color in the palette.
// Return the search number, the search RGB and the converted RGB match
foreach($colors as $id => $rgb)
{
    $result = imagecolorclosest($im, $rgb[0], $rgb[1], $rgb[2]);
    $result = imagecolorsforindex($im, $result);
    $result = "({$result['red']}, {$result['green']}, {$result['blue']})";

    echo "#$id: Search ($rgb[0], $rgb[1], $rgb[2]); Closest match: $result.\n";
}

imagedestroy($im);



?>
