<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Import Library required classes
 */
use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // The relative or absolute path to the image file
        $imagePath = $this->get('kernel')->getRootDir() . '/../web/bird.png';
        
        // Create the palette of the image
        $palette = Palette::fromFilename($imagePath);

        // Create an instance of the extractor
        $extractor = new ColorExtractor($palette);

        // An array to store the hexadecimal colors
        $hexColors = [];

        // Loop through the 5 representative colors (in integer format)
        foreach($palette as $color => $count) {

            // Convert the number to its hex representation and add to the $hexColors array
            array_push($hexColors , Color::fromIntToHex($color));
        }

        // ["#FF7B16","#DFC017","#679C0C","#E60B11","#186108", .......]
        return new Response(json_encode($hexColors));
    }
}
