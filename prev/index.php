<?php
session_start();
isset($_SESSION['int']) ? $_SESSION['int'] = $_SESSION['int'] : $_SESSION['int'] = 0;
isset($_POST['next']) ? $_SESSION['int']++ : 'error next';
isset($_POST['prev']) ? $_SESSION['int']-- : 'error prev';
isset($_POST['clear']) ? $_SESSION['int']=0 : 'error clera';
isset($_POST['go']) ? $_SESSION['int'] = $_POST['int'] : 'error go';
//*//
isset($_SESSION['font']) ? $_SESSION['font'] = $_SESSION['font'] : $_SESSION['font'] = 0;
isset($_POST['next-f']) ? $_SESSION['font']++ : 'error next';
isset($_POST['prev-f']) ? $_SESSION['font']-- : 'error prev';
isset($_POST['clear-f']) ? $_SESSION['font']=0 : 'error clera';
isset($_POST['go-f']) ? $_SESSION['font'] = $_POST['font'] : 'error go';
?>
<html>
<head>
<title>Background preview</title>
<link href='http://fonts.googleapis.com/css?family=Inconsolata:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Comfortaa:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Black+Ops+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Archivo+Black&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Julius+Sans+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Capriola&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Rye&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Keania+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ribeye+Marrow&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Nosifer&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ewert&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Diplomata&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Akronim&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Eater&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ribeye&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300italic,300,400italic,700italic,900,700,900italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<style>
body{
    color:white;
    background:#1b1e1e url('<?php echo $_SESSION['int']; ?>.jpg') repeat fixed;
    <?php echo ($_SESSION['font'] == 1)? $name = 'font-family: Inconsolata;' : ''; ?>
    <?php echo ($_SESSION['font'] == 2)? $name = 'font-family: Josefin Sans, sans-serif;' : ''; ?>
    <?php echo ($_SESSION['font'] == 3)? $name = 'font-family: Comfortaa, cursive;' : ''; ?>
    <?php echo ($_SESSION['font'] == 4)? $name = 'font-family: Black Ops One, cursive;' : ''; ?>
    <?php echo ($_SESSION['font'] == 5)? $name = 'font-family: Archivo Black, sans-serif;' : ''; ?>
    <?php echo ($_SESSION['font'] == 6)? $name = 'font-family: Julius Sans One, sans-serif;' : ''; ?>
    <?php echo ($_SESSION['font'] == 7)? $name = 'font-family: Capriola, sans-serif;' : ''; ?>
    <?php echo ($_SESSION['font'] == 8)? $name = 'font-family: Rye, cursive;' : ''; ?>
    <?php echo ($_SESSION['font'] == 9)? $name = 'font-family: Keania One, cursive;' : ''; ?>
    <?php echo ($_SESSION['font'] == 10)? $name = 'font-family: Ribeye Marrow, cursive;' : ''; ?>
    <?php echo ($_SESSION['font'] == 11)? $name = 'font-family: Nosifer, cursive;' : ''; ?>
    <?php echo ($_SESSION['font'] == 12)? $name = 'font-family: Ewert, cursive;' : ''; ?>
    <?php echo ($_SESSION['font'] == 13)? $name = 'font-family: Diplomata, cursive;' : ''; ?>
    <?php echo ($_SESSION['font'] == 14)? $name = 'font-family: Akronim, cursive;' : ''; ?>
    <?php echo ($_SESSION['font'] == 15)? $name = 'font-family: Eater, cursive;' : ''; ?>
    <?php echo ($_SESSION['font'] == 16)? $name = 'font-family: Ribeye, cursive;' : ''; ?>
    <?php echo ($_SESSION['font'] == 17)? $name = 'font-family: Lato, sans-serif;' : ''; ?>

}
</style>
</head>
<body>
<h1>Background preview</h1>
<form method="POST">
    <input type="submit" name="prev" value ="prev" />
    <input type="text" name="int" value ="<?php echo $_SESSION['int']; ?>" />   
    <input type="submit" name="next" value ="next" />
    <input type="submit" name="go" value ="go" />
    <input type="submit" name="clear" value ="reset" />
</form>
<form method="POST">
    <input type="submit" name="prev-f" value ="prev" />
    <input type="text" name="font" value ="<?php echo $_SESSION['font']; ?>" />   
    <input type="submit" name="next-f" value ="next" />
    <input type="submit" name="go-f" value ="go" />
    <input type="submit" name="clear-f" value ="reset" />
</form>
<h1>Notatnik</h1>
<h2><?php echo @$name; ?></h2>
<h3><?php echo $_SESSION['font']; ?></h3>
</body>
</html>