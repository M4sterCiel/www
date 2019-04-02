<?php

Class Vector {

    public static $verbose = FALSE;
    private $_mag_x;
    private $_mag_y;
    private $_mag_z;
    private $_coord_w;


    public function __construct( array $kwargs ) {
        if (self::$verbose === TRUE)
        return;
    }

    public function __destruct() {
        if (self::$verbose === TRUE)
        return;
    }

    public function magnitude() {
        return;
    }

    public function Vector normalize() {

    }

    public function Vector add( Vector $rhs ) {

    }

    public function Vector sub( Vector $rhs ) {

    }

    public function Vector opposite() {

    }
  
    public function Vector scallarProduct( $k ) {

    }

    public function float dotProduct( Vector $rhs ) {

    }

    public function float cos( Vector $rhs ) {

    }

    public function Vector crossProduct( Vector $rhs ) {

    }

    public function getXmagn() {
        return ($this->_mag_x);
    }
    public function getYmagn() {
        return ($this->_mag_y);
    }
    public function getZmagn() {
        return ($this->_mag_z);
    }
    public function getWcoord() {
        return ($this->_coord_w);
    }

    public function __toString() {
        return;
    }

    static function doc() {
        return file_get_contents('Vector.doc.txt') . PHP_EOL;
    }
}

?>