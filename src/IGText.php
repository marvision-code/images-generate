<?php

namespace Marvision\ImagesGenerate;


class IGText  
{
  
	public function __construct(){
		

	}

	public static function run($text,$color,$bg,$w,$h){ 

		$image = imagecreate($w,$h); 
        $background =  self::color($image,$bg);
        $text_colour = self::color($image,$color);
        //$line_colour = self::color($image,'yellow');

        self::text($image,$text,$text_colour);
        //imagesetthickness ( $image, 3 );
        //imageline( $image, 20, 45, 165, 45, $line_colour );
        //imageline( $image, 20, 50, 165, 50, $text_colour );

        return self::create($image);
       
	}



	public static function create($image,$data=null){ 
		$default_folder = "img/ImagesGenerate/TextImg/";
		$default_ext = "png";
		$folder = (!empty($data['folder'])) ? $data['folder'] : $default_folder ; 
        \File::makeDirectory($folder, 0775, true,true);
        $ext = (!empty($data['ext'])) ? $data['ext'] : $default_ext ;
        $name = (!empty($data['name'])) ? $data['name'] : uniqid() ;
        switch ($ext) { 
		    case 'png':
		        $url = $folder.$name.".png";
		        imagepng($image,$url);
		        break;
		    case 'jpg':
		        $url = $folder.$name.".jpg";
		        imagejpeg($image,$url);
		        break; 
		}
        return $url;
	} 


	public static function text($image,$text,$color){ 
		$top = 5;
		$left = 5;
		$font_size = 5;/*1-5*/
		return imagestring( $image, $font_size, $left, $top, $text, $color );
	} 

	public static function color($image,$color){
		$color = self::hex2rgb($color);
		return imagecolorallocate( $image, $color[0], $color[1], $color[2] );
	}  


	 
	public static function hex2rgb($hex) {
		$colors = self::libColors(); 
			 
		$hex = (!empty($colors[$hex])) ? $colors[$hex] : $hex ; 
	    $hex = str_replace("#", "", $hex);

	   if(strlen($hex) == 3) {
	      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
	      $r = hexdec(substr($hex,0,2));
	      $g = hexdec(substr($hex,2,2));
	      $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   //return implode(",", $rgb); // returns the rgb values separated by commas
	   return $rgb; // returns an array with the rgb values
	}

	public static function libColors(){
		return [
			'black'		=>'#000000',
			'silver'	=>'#C0C0C0',
			'gray'		=>'#808080',
			'white'		=>'#FFFFFF', 
			'whitesmoke'=>'#F5F5F5', 
			'maroon'	=>'#800000', 
			'red'		=>'#FF0000', 
			'purple'	=>'#800080', 
			'fuchsia'	=>'#FF00FF', 
			'green'		=>'#008000', 
			'lime'		=>'#00FF00', 
			'olive'		=>'#808000', 
			'yellow'	=>'#FFFF00', 
			'navy'		=>'#000080', 
			'blue'		=>'#0000FF', 
			'royalblue'	=>"#4169E1",
			'dodgerblue'=>"#1E90FF",
			'deepskyblue'=>"#00BFFF",
			'teal'		=>'#008080', 
			'aqua'		=>'#00FFFF', 
			'orange'	=>'#FFA500', 
			]; 
	}
	 
}