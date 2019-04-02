<?php


Class Color {

    public static $verbose = FALSE;
    public $red = 0;
    public $green = 0;
    public $blue = 0;


    function __construct( array $kwargs ) {
        if (array_key_exists('rgb', $kwargs))
        {
            $rgb = intval($kwargs['rgb']);
            $rgb = sprintf('%06X', $rgb);
            $rgb_array = array ();
            $rgb_array['red'] = substr($rgb, 0, 2);
            $rgb_array['green'] = substr($rgb, 2, 2);
            $rgb_array['blue'] = substr($rgb, 4, 2);
            $this->red = hexdec($rgb_array['red']);
            $this->green = hexdec($rgb_array['green']);
            $this->blue = hexdec($rgb_array['blue']);
        }
        else if ($kwargs['red'] !== NULL && $kwargs['green'] !== NULL && $kwargs['blue'] !== NULL)
        {
            foreach ($kwargs as $key => $val)
                $val = intval($val);
            $this->red = round($kwargs['red']);
            $this->green = round($kwargs['green']);
            $this->blue = round($kwargs['blue']);
        }
        if ($this->red < 0)
            $this->red = 0;
        if ($this->green < 0)
            $this->green = 0;
        if ($this->blue < 0)
            $this->blue = 0;
        if ($this->red > 255)
            $this->red = 255;
        if ($this->green > 255)
            $this->green = 255;
        if ($this->blue > 255)
            $this->blue = 255;
        if (self::$verbose === TRUE)
            printf('Color( red: %3d, green: %3d, blue: %3d) constructed.' . PHP_EOL, $this->red, $this->green, $this->blue);
    }

    function __destruct() {
        if (self::$verbose === TRUE)
        printf('Color( red: %3d, green: %3d, blue: %3d) destructed.' . PHP_EOL, $this->red, $this->green, $this->blue);
    }

    function add( $color) {
        return new Color( array( 'red' => $this->red + $color->red, 'green' => $this->green + $color->green, 'blue' => $this->blue + $color->blue ) );
    }

    function sub( $color) {
        return new Color( array( 'red' => $this->red - $color->red, 'green' => $this->green - $color->green, 'blue' => $this->blue - $color->blue ) );
    }

    function mult( $color) {
        return new Color( array( 'red' => $this->red * $color, 'green' => $this->green * $color, 'blue' => $this->blue * $color ) );
    }

    function __toString () {
        return 'Color( red: ' . sprintf('%3d', $this->red) . ', green: ' . sprintf('%3d', $this->green) . ', blue: ' . sprintf('%3d', $this->blue) . ')';
    }

    static function doc() {
        return file_get_contents('Color.doc.txt') . PHP_EOL;
    }
}


