<?php 

class Color {
    public $red = 0;
    public $green = 0;
    public $blue = 0;
 
    public function __construct($red, $green, $blue)
    {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }
}

$colors = [];
 
for ($i = 0; $i < 750; $i++) {
  $red = ceil(mt_rand(0, 255));
  $green = ceil(mt_rand(0, 255));
  $blue = ceil(mt_rand(0, 255));
 
  $colors[] = new Color($red, $blue, $green);
}

function renderColors($colors, $sortedBy) {
    $color_width = 1;
 
    $width = count($colors) * $color_width;
    $height = 50;
 
    $im = imagecreatetruecolor($width, $height);
    $background_color = imagecolorallocate($im, 255, 255, 255);
 
    $x = 0;
 
    foreach ($colors as $colorObject) {
      $color = imagecolorallocate($im, $colorObject->red, $colorObject->green, $colorObject->blue);
      imagefilledrectangle($im, $x, 0, $x + $color_width,$height, $color);
 
      $x = $x + $color_width;
    }
 
    imagepng($im, 'colors-' . $sortedBy . '.png');
    imagedestroy($im);
}

renderColors($colors, 'none');
print_r(renderColors($colors, 'none'));

usort($colors, function ($a, $b) {
  return ($a->red + $a->green + $a->blue) <=> ($b->red + $b->green + $b->blue);
});

usort($colors, function ($a, $b) {
      $aValue['red'] = str_pad(dechex($a->red), 2, '0', STR_PAD_LEFT);
      $aValue['green'] = str_pad(dechex($a->green), 2, '0', STR_PAD_LEFT);
      $aValue['blue'] = str_pad(dechex($a->blue), 2, '0', STR_PAD_LEFT);
 
      $bValue['red'] = str_pad(dechex($b->red), 2, '0', STR_PAD_LEFT);
      $bValue['green'] = str_pad(dechex($b->green), 2, '0', STR_PAD_LEFT);
      $bValue['blue'] = str_pad(dechex($b->blue), 2, '0', STR_PAD_LEFT);
 
      $aValue = implode($aValue);
      $bValue = implode($bValue);
 
      return $aValue <=> $bValue;
});

function calculateLightness($color) {
  $red = $color->red / 255;
  $green = $color->green / 255;
  $blue = $color->blue / 255;
 
  $chroma_min = min($red, $green, $blue);
  $chroma_max = max($red, $green, $blue);
 
  return ($chroma_max + $chroma_min) / 2;
}
 
usort($colors, function ($a, $b) {
  return calculateLightness($a) <=> calculateLightness($b);
});

function calculateLuminance($color) {
  return (0.2126 * $color->red) + (0.7152 * $color->green) + (0.0722 * $color->blue);
}
 
usort($colors, function ($a, $b) {
  return calculateLuminance($a) <=> calculateLuminance($b);
});

function rgbTohsv($color) {
  $red = $color->red / 255;
  $green = $color->green / 255;
  $blue = $color->blue / 255;
 
  $min = min($red, $green, $blue);
  $max = max($red, $green, $blue);
 
  switch ($max) {
    case 0:
      // If the max value is 0.
      $hue = 0;
      $saturation = 0;
      $value = 0;
      break;
    case $min:
      // If the maximum and minimum values are the same.
      $hue = 0;
      $saturation = 0;
      $value = round($max, 4);
      break;
    default:
      $delta = $max - $min;
      if ($red == $max) {
        $hue = 0 + ($green - $blue) / $delta;
      } elseif ($green == $max) {
        $hue = 2 + ($blue - $red) / $delta;
      } else {
        $hue = 4 + ($red - $green) / $delta;
      }
      $hue *= 60;
      if ($hue < 0) {
        $hue += 360;
      }
      $saturation = $delta / $max;
      $value = round($max, 4);
  }
 
  return ['hue' => $hue, 'saturation' => $saturation, 'value' => $value];
}

usort($colors, function ($a, $b) {
  $hsv1 = rgbTohsv($a);
  $hsv2 = rgbTohsv($b);
 
  return ($hsv1['hue'] + $hsv1['saturation'] + $hsv1['value']) <=> ($hsv2['hue'] + $hsv2['saturation'] + $hsv2['value']);
});


