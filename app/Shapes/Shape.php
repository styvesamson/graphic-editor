<?php
/**
 * @author  Yves Toupe
 * Date: 2019-05-29
 * Time: 14:49
 */

namespace App\Shapes;


class Shape {
    var $x;
    var $y;

    // constructor
    function Shape($initx, $inity) {
        $this->moveTo($initx, $inity);
    }

    // accessors for x & y coordinates
    function getX() {
        return $this->x;
    }
    function getY() {
        return $this->y;
    }
    function setX($newx) {
        $this->x = $newx;
    }
    function setY($newy) {
        $this->y = $newy;
    }

    // modify the shape coordinates
    function moveTo($newx, $newy) {
        $this->setX($newx);
        $this->setY($newy);
    }
    function rMoveTo($deltax, $deltay) {
        $this->moveTo(($this->getX() + $deltax), ($this->getY() + $deltay));
    }

    // abstract method to override
    function draw() {
    }
}
