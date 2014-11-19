<?php
include('ImageCreateFromBmp.php');
Class ImageResize
{
    private $src_img;
    private $dst_img;
    private $max_width;
    private $max_height;
    public function __setSrcImg($src_img)
    {
        $this->src_img = $src_img;
    }
    public function __setDstImg($dst_img)
    {
        $this->dst_img = $dst_img;
    }
    public function __setMaxWidth($max_width)
    {
        $this->max_width = $max_width;
    }
    public function __setMaxHeight($max_height)
    {
        $this->max_height = $max_height;
    }
    // public function resizeImg2()
    // {
        // $filename = $this->src_img;
        // //the resize will be a percent of the original size
        // $percent = 0.5;

        // // Content type
        // //header('Content-Type: image/jpeg');

        // // Get new sizes
        // list($width, $height) = getimagesize($filename);
        // $newwidth = $width * $percent;
        // $newheight = $height * $percent;

        // // Load
        // $thumb = imagecreatetruecolor($newwidth, $newheight);
        // $source = imagecreatefromjpeg($filename);

        // // Resize
        // imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        // // Output and free memory
        // //the resized image will be 400x300
        // imagejpeg($thumb, $this->dst_img, 90);
        // imagedestroy($thumb);
    // }
    public function resizeImg()
    {
        $filename = $this->src_img;
        // Content type
        //header('Content-Type: image/jpeg');
        // Get new sizes
        $arr_img = list($width, $height, $type) = getimagesize($filename);
        //var_dump(getimagesize($filename));
        //echo $type;//2
        //echo $arr_img['mime'];//image/jpg
        //echo $type   = exif_imagetype($filename);//2
        //--
        //1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP, 7 = TIFF(orden de bytes intel), 8 = TIFF(orden de bytes motorola), 9 = JPC, 10 = JP2, 11 = JPX, 12 = JB2, 13 = SWC, 14 = IFF, 15 = WBMP, 16 = XBM. 
        //$path_parts  = pathinfo($filename);
        //echo $path_parts ['extension'];
        //*
        $max_width = $this->max_width;
        $max_height = $this->max_height;
        if ($width > $max_width) {//dopasowywuje jeśli zaszerokie
            $proc = ($max_width / $width) * 100;
            $new_width = $max_width;
            $new_height = ($proc / 100) * $height;
            if ($new_height > $max_height) {
                $proc = ($max_height / $new_height) * 100;
                $new_height = $max_height;
                $new_width = ($proc / 100) * $new_width;        
            }
        } else {
            $new_width = $width;
        }        
        if ($height > $max_height) {//dopasowywuje jesli zawysokie
            $proc = ($max_height / $height) * 100;
            $new_height = $max_height;
            $new_width = ($proc / 100) * $width;
            if ($new_width > $max_width) {
                $proc = ($max_width / $new_width) * 100;
                $new_width = $max_width;
                $new_height = ($proc / 100) * $new_height;        
            }
        } else {
            $new_height = $height;
        }
        //*
        $new_w = $new_width;
        $new_h = $new_height;
        // Create empty form
        $thumb = imagecreatetruecolor($this->max_width, $this->max_height);
        //**przeźroczystość
        imagesavealpha($thumb, true);
        //imagealphablending($thumb, false);
        $white = imagecolorallocatealpha($thumb, 255, 255, 255, 60);//127 to przeźroczystość
        imagefill($thumb, 0, 0, $white);
        //**
        // Get surroces image
        //$source = imagecreatefromjpeg($filename);
        switch ($type) {
            case 1:
                $source = imagecreatefromgif($filename);
                break;
            case 2:
                $source = imagecreatefromjpeg($filename);
                break;
            case 3:
                $source = imagecreatefrompng($filename);
                break;
            case 4:
                $source = imagecreatefromswf($filename);
                break;
            case 5:
                $source = imagecreatefrompsd($filename);
                break;
            case 6:
                $source = ImageCreateFromBmp($filename);
                break;    
            case 7:
                $source = imagecreatefromtiff($filename);
                break;    
            case 8:
                $source = imagecreatefromtiff($filename);
                break;
        }
        //** Positon center
        $center_w = ($this->max_width - $new_w) / 2;
        $center_h = ($this->max_height - $new_h) / 2;
        //**
        // Resize
        imagecopyresized($thumb, $source, $center_w, $center_h, 0, 0, $new_w, $new_h, $width, $height);
        // Save destyny image
        imagepng($thumb, $this->dst_img, 0);
        // Destroy handle
        imagedestroy($thumb);
        
    }
    public function showSrcImg()
    {
        echo '<img class="src-img" src="'.$this->src_img.'" />';
    }
    public function showDstImg()
    {
        echo '<img class="dst-img" src="'.$this->dst_img.'" />';
    }
    public function resizeImage($file, $m_width, $m_height, $save)
    {
        $this->src_img      = $file;
        $this->max_width    = $m_width;
        $this->max_height   = $m_height;
        $this->dst_img      = $save;
        $filename = $this->src_img;
        // Content type
        //header('Content-Type: image/jpeg');
        // Get new sizes
        $arr_img = list($width, $height, $type) = getimagesize($filename);
        //var_dump(getimagesize($filename));
        //echo $type;//2
        //echo $arr_img['mime'];//image/jpg
        //echo $type   = exif_imagetype($filename);//2
        //--
        //1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP, 7 = TIFF(orden de bytes intel), 8 = TIFF(orden de bytes motorola), 9 = JPC, 10 = JP2, 11 = JPX, 12 = JB2, 13 = SWC, 14 = IFF, 15 = WBMP, 16 = XBM. 
        //$path_parts  = pathinfo($filename);
        //echo $path_parts ['extension'];
        //*
        $max_width = $this->max_width;
        $max_height = $this->max_height;
        if ($width > $max_width) {//dopasowywuje jeśli zaszerokie
            $proc = ($max_width / $width) * 100;
            $new_width = $max_width;
            $new_height = ($proc / 100) * $height;
            if ($new_height > $max_height) {
                $proc = ($max_height / $new_height) * 100;
                $new_height = $max_height;
                $new_width = ($proc / 100) * $new_width;        
            }
        } else {
            $new_width = $width;
        }        
        if ($height > $max_height) {//dopasowywuje jesli zawysokie
            $proc = ($max_height / $height) * 100;
            $new_height = $max_height;
            $new_width = ($proc / 100) * $width;
            if ($new_width > $max_width) {
                $proc = ($max_width / $new_width) * 100;
                $new_width = $max_width;
                $new_height = ($proc / 100) * $new_height;        
            }
        } else {
            $new_height = $height;
        }
        //*
        $new_w = $new_width;
        $new_h = $new_height;
        // Create empty form
        $thumb = imagecreatetruecolor($this->max_width, $this->max_height);
        //**przeźroczystość
        imagesavealpha($thumb, true);
        //imagealphablending($thumb, false);
        $white = imagecolorallocatealpha($thumb, 255, 255, 255, 127);//127 to przeźroczystość
        imagefill($thumb, 0, 0, $white);
        //**
        // Get surroces image
        //$source = imagecreatefromjpeg($filename);
        switch ($type) {
            case 1://gif
                $source = imagecreatefromgif($filename);
                break;
            case 2://jpeg
                $source = imagecreatefromjpeg($filename);
                break;
            case 3://png
                $source = imagecreatefrompng($filename);
                break;
            case 6://bmp
                $source = ImageCreateFromBmp($filename);
                break;    
        }
        //** Positon center
        $center_w = ($this->max_width - $new_w) / 2;
        $center_h = ($this->max_height - $new_h) / 2;
        //**
        // Resize
        imagecopyresized($thumb, $source, $center_w, $center_h, 0, 0, $new_w, $new_h, $width, $height);
        // Save destyny image
        imagepng($thumb, $this->dst_img, 0);
        // Destroy handle
        imagedestroy($thumb);
        //return $return;
        
    }
}
//$setcls = new ImageResize();
// Setiing
//$nr=1;
//$setcls->__setMaxWidth(200);
//$setcls->__setMaxHeight(200);
//$setcls->__setSrcImg('data/src'.$nr.'.jpg');
//$setcls->__setSrcImg(dirname(__FILE__).'/data/src'.$nr.'.jpg');
//$setcls->__setDstImg('data/dst'.$nr.'.png');
//$setcls->__setDstImg(dirname(__FILE__).'/data/dst'.$nr.'.png');
// Trigger
//$setcls->resizeImg();
// Resize one trigger
$file='data/src1.jpg';
$save='data/dst1.jpg';
$cls_resize = new ImageResize();
$cls_resize->resizeImage($file,400,400,$save);
?>
<!--
<!DOCTYPE html>
<html lang="pl">
<head> 
    <meta charset="UTF-8">
    <link rel='stylesheet' type='text/css' href='css/style.php' />
</head>
<body>
    <h1>Hello I'm Resize App in future!</h1>
    <?php //$setcls->showSrcImg(); ?>
    <?php //$setcls->showDstImg(); ?>
    <?php //echo $setcls->resizeImage(); ?>
</body>
</html>
-->