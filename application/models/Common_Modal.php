<?php
class Common_Modal extends CI_Model
{
        function __construct() {
       // Call the Model constructor
        parent::__construct();

    }

    function compress_image($src, $dest , $quality) 
    {
        $info = getimagesize($src);
        if ($info['mime'] == 'image/jpeg') 
        {
            $image = imagecreatefromjpeg($src);
        }
        elseif ($info['mime'] == 'image/gif') 
        {
            $image = imagecreatefromgif($src);
        }
        elseif ($info['mime'] == 'image/png') 
        {
            $image = imagecreatefrompng($src);
        }
        else
        {
            die('Unknown image file format');
        }
        imagejpeg($image, $dest, $quality);
        return $dest;
    }
	
}