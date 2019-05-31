<?php
/**
 * @author  Yves Toupe
 * Date: 2019-05-29
 * Time: 14:49
 */

namespace App\Shapes\Rectangle;
use App\Shapes\Shape;


class Rectangle extends Shape {
    var $width;
    var $height;

    // constructor
    function Rectangle($initx, $inity, $initwidth, $initheight) {
        $this->Shape($initx, $inity);
        $this->setWidth($initwidth);
        $this->setHeight($initheight);
    }

    // accessors for width & height attributes
    function getWidth() {
        return $this->width;
    }
    function getHeight() {
        return $this->height;
    }
    function setWidth($newwidth) {
        $this->width = $newwidth;
    }
    function setHeight($newheight) {
        $this->height = $newheight;
    }

    // draw the rectangle
    function draw() {
        echo "Drawing a Rectangle at:(" . $this->getX() . "," . $this->getY() .
            "), width " . $this->getWidth() . ", height " . $this->getHeight() . "<BR>";
    }
}
