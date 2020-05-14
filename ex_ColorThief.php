
<?php

//namespace ColorThief\Test;

use ColorThief\ColorThief;

require 'color.php';
foreach(glob('./image/*.{jpg,png,gif}', GLOB_BRACE) as $img) {

  //$default_color = 'ffffff';
  $default_color = 'ff0000';
  $color = simple_color_thief($img, $default_color);
  $style = 'width:26%;padding:50px;background:#'.$color.';display:inline-block';
  echo '<div style="'.$style.'">';
  echo '<img style="height:200px" src="'.$img.'">';
  echo '</div>';

  print_r($style);
}