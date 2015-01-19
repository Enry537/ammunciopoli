<?php
session_start();


if(isset($_GET["login"]))
if ($_GET['login'] == "success") 
header( "refresh:1;url={$_SERVER['PHP_SELF']}" ); 

if(isset($_GET["insert"]))
if ($_GET['insert'] == "success") 
header( "refresh:1;url={$_SERVER['PHP_SELF']}" ); 

if(isset($_GET["logout"]))
if ($_GET['login'] == "success") 
header( "refresh:1;url={$_SERVER['PHP_SELF']}" ); 


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Annunciopoli | Annunci gratis</title>
<link href="files/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container">
    <div id="header">
         </div><!--#header-->
        <div id="navigation"><?php include ('files/menu_Hor.html'); ?></div><!--#navigation-->
    <div id="sidebar">
<?php include ('files/menu_Sid.php'); ?>
    </div>
    <div id="main">
        <?php include ('files/form_Ins.php'); ?>
    </div>
    <div id="footer"><?php include ('files/footer.html'); ?></div>
</div>
</body>
</html>
