<?php
/**
 * @author  Yves Toupe
 * Date: 2019-05-29
 * Time: 14:49
 */

namespace App\Shapes\Circle;
use App\Shapes\Shape;

class Circle extends Shape {
    var $radius;

    // constructor
    function Circle($initx, $inity, $initradius) {
        $this->Shape($initx, $inity);
        $this->setRadius($initradius);
    }

    // accessors for radius attribute
    function getRadius() {
        return $this->radius;
    }
    function setRadius($newradius) {
        $this->radius = $newradius;
    }

    // draw the circle
    function draw() {
        echo "Drawing a Circle at:(" . $this->getX() . "," . $this->getY() .
            "), radius " . $this->getRadius() ."<BR>";
    }
}
