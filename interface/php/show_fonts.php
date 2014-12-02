<?php
//$files = glob('../data/fonts/*.*');
$files = glob('data/fonts/*.otf');
//$time  = time();

foreach ($files as $file) {
    if (is_file($file)) {
        //echo $file.' - '.basename($file);
        //echo '<br />';
        ?>
        <option style="font-family: <?php echo basename($file, '.otf'); ?>;" value="<?php echo $file ?>"><?php echo basename($file, '.otf'); ?></option>
        <?php
    };
};
?>
<?php
// function filePathParts($arg) {
    // echo $arg['dirname'], "<br />";
    // echo $arg['basename'], "<br />";
    // echo $arg['extension'], "<br />";
    // echo $arg['filename'], "<br />";
// };
// foreach ($files as $file) {
    // filePathParts(pathinfo($file));
// };
?>