<?php

require_once 'Color.class.php';

Class Vertex {

    public static $verbose = FALSE;
    private $_x;
    private $_y;
    private $_z;
    private $_w;
    private $_color;

    public function __construct( array $kwargs) {
        $this->_color = new Color ( array ( 'red' => 255, 'green' =>   255, 'blue' =>   255 ));
        $this->_w = 1.00;
        if ($kwargs['x'] !== NULL && $kwargs['y'] !== NULL && $kwargs['z'] !== NULL)
        {
            $this->_x = $kwargs['x'];
            $this->_y = $kwargs['y'];
            $this->_z = $kwargs['z'];
            if (array_key_exists('w', $kwargs) && $kwargs['w'] !== NULL)
                $this->_w = $kwargs['w'];
            if (array_key_exists('color', $kwargs) && $kwargs['color'] !== NULL)
                $this->_color = $kwargs['color'];
            if (self::$verbose === TRUE)
                print('Vertex( x: '.sprintf("%.2f", $this->_x).', y: '.sprintf("%.2f",$this->_y).', z: '.sprintf("%.2f", $this->_z).', w: '.sprintf("%.2f", $this->_w).', '.$this->_color.' ) constructed'.PHP_EOL);
        }
    }

    public function getX() {
        return ($this->_x);
    }
    public function getY() {
        return ($this->_y);
    }
    public function getZ() {
        return ($this->_z);
    }
    public function getW() {
        return ($this->_w);
    }
    public function getColor() {
        return ($this->_color);
    }
    public function setX( $x_val ) {
        return ($this->_x = $x_val);
    }
    public function setY( $y_val ) {
        return ($this->_y = $y_val);
    }
    public function setZ( $z_val ) {
        return ($this->_z);
    }
    public function setW( $w_val ) {
        return ($this->_w = $w_val);
    }
    public function setColor($col_val) {
        return ($this->_color = $col_val);
    }

    public function __destruct() {
        if (self::$verbose === TRUE)
            print('Vertex( x: '.sprintf("%.2f", $this->_x).', y: '.sprintf("%.2f",$this->_y).', z: '.sprintf("%.2f", $this->_z).', w: '.sprintf("%.2f", $this->_w).', '.$this->_color.' ) destructed'.PHP_EOL);
    }

    public function __toString() {
        if (self::$verbose === TRUE)
            return 'Vertex( x: '.sprintf("%.2f", $this->_x).', y: '.sprintf("%.2f",$this->_y).', z: '.sprintf("%.2f", $this->_z).', w: '.sprintf("%.2f", $this->_w).', '.$this->_color.' )';
        else
            return 'Vertex( x: ' . sprintf('%3.2f', $this->_x) . ', y: ' . sprintf('%3.2f', $this->_y) . ', z: ' . sprintf('%3.2f', $this->_z) . ', w: ' . sprintf('%3.2f', $this->_w) . ')';
    }

    public static function doc() {
        return file_get_contents('Vertex.doc.txt') . PHP_EOL;
    }
}


?>