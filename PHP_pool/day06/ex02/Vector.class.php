<?php

require_once 'Vertex.class.php';

Class Vector {

    public static $verbose = FALSE;
    private $_mag_x;
    private $_mag_y;
    private $_mag_z;
    private $_coord_w = 0;


    public function __construct( array $kwargs ) {
        if (isset($kwargs['dest']) && $kwargs['dest'] instanceof Vertex) 
        {
            if (isset($kwargs['orig']) && $kwargs['orig'] instanceof Vertex) 
            {
                $orig = new Vertex(array('x' => $kwargs['orig']->getX(), 'y' => $kwargs['orig']->getY(), 'z' => $kwargs['orig']->getZ()));
            } 
            else 
            {
                $orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
            }
            $this->_mag_x = $kwargs['dest']->getX() - $orig->getX();
			$this->_mag_y = $kwargs['dest']->getY() - $orig->getY();
			$this->_mag_z = $kwargs['dest']->getZ() - $orig->getZ();
			$this->_coord_w = 0.0;
        }
        if (self::$verbose === TRUE)
            printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) constructed\n", $this->_mag_x, $this->_mag_y, $this->_mag_z, $this->_coord_w);
    }

    public function __destruct() {
        if (self::$verbose === TRUE)
            printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) destructed\n", $this->_mag_x, $this->_mag_y, $this->_mag_z, $this->_coord_w);
    }

    public function magnitude() {  // Formule pour calculer la norme d'un vecteur: √(x² + y² + z²)
        return sqrt(($this->_mag_x * $this->_mag_x) + ($this->_mag_y * $this->_mag_y) + ($this->_mag_z * $this->_mag_z));  
    }

    public function normalize() {
        $norm = $this->magnitude();
        return (new Vector(['dest' => new Vertex(['x' => $this->_mag_x / $norm, 'y' => $this->_mag_y / $norm, 'z' => $this->_mag_z / $norm])]));
    }

    public function add( $rhs ) { // Faire la somme de  x y z des deux vecteurs puis les retourner dans un nouveau vertex puis dans un nouveau vecteur
        $x = $this->_mag_x + $rhs->getXmagn();
        $y = $this->_mag_y + $rhs->getYmagn();
        $z = $this->_mag_z + $rhs->getZmagn();
        $res = new Vertex ( array ( 'x' => $x, 'y' => $y, 'z' => $z, 'w' => 0.0));
        return (new Vector( array ('dest' => $res)));
    }

    public function sub( $rhs ) {
        $x = $this->_mag_x - $rhs->getXmagn();
        $y = $this->_mag_y - $rhs->getYmagn();
        $z = $this->_mag_z - $rhs->getZmagn();
        $res = new Vertex ( array ( 'x' => $x, 'y' => $y, 'z' => $z, 'w' => 0.0));
        return (new Vector( array ('dest' => $res)));
    }

    public function opposite() { // C'est l'inverse du vecteur actuel, donc on le multiplie par -1
        $x = $this->_mag_x * -1;
        $y = $this->_mag_y * -1;
        $z = $this->_mag_z * -1;
        $res = new Vertex ( array ( 'x' => $x, 'y' => $y, 'z' => $z, 'w' => 0.0));
        return (new Vector( array ('dest' => $res)));
    }
  
    public function scalarProduct( $k ) { // on multiplie chaque element du vecteur par $k
        $x = $this->_mag_x * $k;
        $y = $this->_mag_y * $k;
        $z = $this->_mag_z * $k;
        $res = new Vertex ( array ( 'x' => $x, 'y' => $y, 'z' => $z, 'w' => 0.0));
        return (new Vector( array ('dest' => $res)));
    }

    public function dotProduct( $rhs ) {
        $x = $this->_mag_x * $rhs->getXmagn();
        $y = $this->_mag_y * $rhs->getYmagn();
        $z = $this->_mag_z * $rhs->getZmagn();
        return ($x + $y + $z);
    }

    public function cos(Vector $rhs ) { // cos = produit scalaire des vecteurs A et B divisé par la racine carrée de la norme de A + racine carrée de la norme de B
        $cos = (float)($this->dotProduct($rhs) / (sqrt(pow($this->_mag_x, 2) + pow($this->_mag_y, 2) + pow($this->_mag_z, 2)) * $rhs->magnitude()));
        return $cos;
    }

     public function crossProduct( $rhs ) {
        return new Vector(array('dest' => new Vertex(array(
            'x' => $this->_mag_y * $rhs->_mag_z - $this->_mag_z * $rhs->_mag_y,
            'y' => $this->_mag_z * $rhs->_mag_x - $this->_mag_x * $rhs->_mag_z,
            'z' => $this->_mag_x * $rhs->_mag_y - $this->_mag_y * $rhs->_mag_x
        ))));    }

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
        return('Vector( x:'.sprintf("%.2f", $this->_mag_x).', y:'.sprintf("%.2f", $this->_mag_y).', z:'.sprintf("%.2f", $this->_mag_z).', w:'.sprintf("%.2f", $this->_coord_w).' )');
    }

    static function doc() {
        return file_get_contents('Vector.doc.txt') . PHP_EOL;
    }
}

?>
