<?php

Class Vector {

    public static $verbose = FALSE;
    private $_mag_x;
    private $_mag_y;
    private $_mag_z;
    private $_coord_w;


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
    
    public function __construct( array $kwargs) {
        return;
    }

    public function __toString() {
        return;
    }

    static function doc() {
        return file_get_contents('Vector.doc.txt') . PHP_EOL;
    }
}

?>