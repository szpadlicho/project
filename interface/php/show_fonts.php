<!--
<p>Fonts:</p>
<select id="fontChange">
    <option value="Arial">Arial</option>
    <option value="Verdana">Verdana</option>
    <option value="Impact">Impact</option>
    <option value="Comic Sans MS">Comic Sans MS</option>
    <option value="" selected>Default</option>
</select>
-->
<p>Fonts:</p>
<select id="fontChange2">
<?php
//$files = glob('../data/fonts/*.*');
$files = glob('data/fonts/*.*');
//$time  = time();

foreach ($files as $file) {
    if (is_file($file)) {
        //echo $file.' - '.basename($file);
        //echo '<br />';
        ?>
        <option value="<?php echo $file ?>"><?php echo basename($file); ?> </option>
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
</select>