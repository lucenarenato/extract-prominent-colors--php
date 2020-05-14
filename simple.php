<?php

require_once 'colors.inc.php';
$ex=new GetMostCommonColors();
$num_results=20;
$reduce_brightness=1;
$reduce_gradients=1;
$delta=24;
$colors=$ex->Get_Color( 'image.png', $num_results, $reduce_brightness, $reduce_gradients, $delta);
print_r($colors);

?>