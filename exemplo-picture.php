<?php

// EXAMPLE PICTURE
$url='image.png';

//var_dump(getColorPallet($url));

echoColors(getColorPallet($url));


function echoColors($pallet){ // OUTPUT COLORSBAR
    foreach ($pallet as $key=>$val)
        echo '<div style="display:inline-block;width:50px;height:20px;background:#'.$val.'"> </div>';
}

function getColorPallet($imageURL, $palletSize=[16,8]){ // GET PALLET FROM IMAGE PLAY WITH INPUT PALLET SIZE
    // SIMPLE CHECK INPUT VALUES
    if(!$imageURL) return false;

    // IN THIS EXEMPLE WE CREATE PALLET FROM JPG IMAGE
    $img = imagecreatefromjpeg($imageURL);

    // SCALE DOWN IMAGE
    $imgSizes=getimagesize($imageURL);

    $resizedImg=imagecreatetruecolor($palletSize[0],$palletSize[1]);

    imagecopyresized($resizedImg, $img , 0, 0 , 0, 0, $palletSize[0], $palletSize[1], $imgSizes[0], $imgSizes[1]);

    imagedestroy($img);

    //CHECK IMAGE
    /*header("Content-type: image/png");
    imagepng($resizedImg);
    die();*/

    //GET COLORS IN ARRAY
    $colors=[];

    for($i=0;$i<$palletSize[1];$i++)
        for($j=0;$j<$palletSize[0];$j++)
            $colors[]=dechex(imagecolorat($resizedImg,$j,$i));

    imagedestroy($resizedImg);

    //REMOVE DUPLICATES
    $colors= array_unique($colors);

    print_r($colors);
    return $colors;

}
?>
