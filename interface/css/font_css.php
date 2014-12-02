<?php
    header("Content-type: text/css; charset: UTF-8");
?>
<?php
    header("Content-type: text/css; charset: UTF-8");

   $brandColor = "#990000";
   $linkColor = "#555555";
   $CDNURL = "http://cdn.blahblah.net";
   $red = 'silver'
?>
body {
   /*background-color: <?php echo $red; ?>;*/
}
<?php
$files = glob('../data/fonts/*.otf');
//$files = glob('data/fonts/*.*');
//$time  = time();
foreach ($files as $file) {
    if (is_file($file)) {
        //echo $file
        //echo basename($file);
        ?>
@font-face {
	font-family: <?php echo basename($file, '.otf'); ?>;
	src: url('<?php echo $file; ?>');
}       
        <?php
    };
};
?>
#show{
    /*font-family:'Titillium-thin';*/
}