<?php
//$files = glob('../data/fonts/*.*');
$files = glob('data/fonts/*.*');
//$time  = time();
foreach ($files as $file) {    
    if (is_file($file)) {
        //echo $file.' - '.basename($file);
        //echo '<br />';
        $ext2 = pathinfo($file, PATHINFO_EXTENSION);
        //echo $ext2;
        //echo '<br />';
        ?>
        <option style="font-family: <?php echo basename($file, '.'.$ext2); ?>;" value="<?php echo $file ?>"><?php echo basename($file, '.'.$ext2); ?></option>
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