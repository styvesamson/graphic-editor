<?php
/**
 * @author  Yves Toupe
 * Date: 2019-05-28
 * Time: 14:49
 */

namespace App\Http\Controllers;

use App\Http\Helper\ResponseBuilder;


class ShapeController extends Controller
{

    var $shapes = [
        ['type' => 'circle', 'params' => [
            'cx' => 300, // cercle center
            'cy' => 110,
            'width' => 150, // size of the arc on different axes
            'height' => 150,
            'color' => 'orange',

        ]],
        ['type' => 'square', 'params' => [
            'x1' => 40,  //top-left corner
            'y1' => 40,
            'x2' => 160,
            'y2' => 160,  //bottom-right corner
            'color' => 'red',
        ]],

        // Other shape
        ['type' => 'triangle', 'params' => [
            'x1' => .7,  //1st corner
            'y1' => 0.1,
            'x2' => 0.8,  //2nd corner
            'y2' => 0.3,
            'x3' => 0.5,  //3rd corner
            'y3' => 0.3,
            'color' => 'blue',
        ]]

        //add  Other shape here
    ];


    // Setting up Editor size
    var $img_width = 800;
    var $img_height = 600;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * Draw  all shapes
     * @return array
     */
    public function index()
    {

        header("Content-type: image/png");

        foreach ($this->shapes as $shape) {
            extract($shape['params']);
            if ($shape['type'] == 'circle') $circle = $shape['params'];
            if ($shape['type'] == 'square') $square = $shape['params'];

            //Add some other shape
            if ($shape['type'] == 'triangle') $triangle = $shape['params'];

            // and other
            // ...

        }


        // Setting up Editor size
        $img = imagecreatetruecolor($this->img_width, $this->img_height);


        // Setting Up Color Pallete

        $white = imagecolorallocate($img, 255, 255, 255);
        $red = imagecolorallocate($img, 255, 0, 0);
        $blue = imagecolorallocate($img, 0, 0, 255);
        $orange = imagecolorallocate($img, 255, 200, 0);


        imagefill($img, 0, 0, $white);


        // Drawing Circle

        if ($circle){
            $color = $circle['color'];
        } $this->drawCircle($circle, $img, $$color);


        // Drawing Square
        if ($square){
            $color = $square['color'];
            $this->drawSquare($square, $img, $$color);
        }



        // Drawing Triangle
        if ($triangle){
            $color = $triangle['color'];
            $this->drawTriangle($triangle, $img, $$color);
        }


        imagepng($img);


        $status = true;
        $info = 'Shapes succesfull drawed ';
        return ResponseBuilder::result($status, $info, 'ok');

    }


    /**
     * Draw Circle
     *
     * @param array $circle
     * @param resource $img
     * @param resource $color
     * @return bool
     */
    private function drawCircle($circle, $img, $color)
    {

        imageellipse($img, $circle['cx'], $circle['cy'], $circle['width'], $circle['height'], $color);

        return true;

    }

    /**
     * Draw Square
     *
     * @param array $square
     * @param resource $img
     * @param resource $color
     * @return bool
     */
    private function drawSquare($square, $img, $color)
    {

        imagerectangle($img, $square['x1'], $square['y1'], $square['x2'], $square['x2'], $color);

        return true;
    }



    /**
     * Draw Square
     *
     * @param array $triangle
     * @param resource $img
     * @param resource $color
     * @return bool
     */
    private function drawTriangle($triangle, $img, $color)
    {
        $img_width = $this->img_width;
        $img_height = $this->img_height;
        imagepolygon($img, [$img_width * $triangle['x1'],
            $img_height * $triangle['y1'],
            $img_width * $triangle['x2'],
            $img_height * $triangle['y2'],
            $img_width * $triangle['x3'],
            $img_height * $triangle['y3']], 3, $color);

        return true;
    }


}
