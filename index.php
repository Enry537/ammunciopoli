<?php
session_start();

	if ( ($_GET['login'] == "success") ||  ($_GET['insert'] == "success") || ($_GET['logout'] == "success") || ($_GET['login'] == "success")) {
	header( "refresh:1;url={$_SERVER['PHP_SELF']}" ); 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Annunciopoli | Annunci gratis</title>
<link href="files/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php

// includiamo il file di connessione al database
include ('files/configurazione.php');

?>
<div id="container">
    <div id="header">
         </div><!--#header-->
        <div id="navigation"><?php include ('files/menu_Hor.html'); ?></div><!--#navigation-->
    <div id="sidebar">
<?php include ('files/menu_Sid.php'); ?>
    </div>
    <div id="main">
        <?php 
		
		// eseguo un controllo per vedere se ho premuto o no sul tasto cerca
		
		if ( ($_GET['categoria'] != null || $_GET['provincia'] != null) || ($_GET['categoria'] != null && $_GET['provincia'] != null) ) {
			if ($_GET['categoria'] != null && $_GET['provincia'] != null) {
			
			$search_Cat=$_GET['categoria'];
        	$search_Pro=$_GET['provincia'];	
			$risultati=mysql_query("SELECT * FROM annunci WHERE categoria = '$search_Cat' AND provincia = '$search_Pro' ORDER BY data DESC"); 
				
				}
				
				if ($_GET['categoria'] != "Seleziona una categoria") {
				
				$search_Cat=$_GET['categoria'];
				$risultati=mysql_query("SELECT * FROM annunci WHERE categoria = '$search_Cat' ORDER BY data DESC"); 
			
				} 
				
				if ($_GET['provincia'] != "Seleziona una provincia") {
				
        		$search_Pro=$_GET['provincia'];
				$risultati=mysql_query("SELECT * FROM annunci WHERE provincia = '$search_Pro' ORDER BY data DESC"); 
				
				}
		
			} else {
					
		$risultati=mysql_query("SELECT * FROM annunci ORDER BY data DESC"); 

			}

        $num=mysql_numrows($risultati);
		
		if ( $num != 0 ) {
		
		$i=0;
		while ($i < $num) { 
     	$titolo=mysql_result($risultati,$i,'titolo');
        $categoria=mysql_result($risultati,$i,'categoria');
        $provincia=mysql_result($risultati,$i,'provincia');
		$prezzo=mysql_result($risultati,$i,'prezzo');
        $descrizione=mysql_result($risultati,$i,'descrizione');
        $mail=mysql_result($risultati,$i,'mail');
		$data=mysql_result($risultati,$i,'data');
 
        echo "<table id='border_shadow' width='640' border='0' bgcolor='#fbfbea'>
  <tr>
    <td width='84' rowspan='4'><img src='files/img/categoria_$categoria.jpg' border='0'></td>
    <td colspan='2'><b>$titolo</b></td>
  </tr>
  <tr>
  	<td width='271'>Prezzo: &#8364; $prezzo</td>
    <td width='271' align='right'>Comune: $provincia</td>
  </tr>
  <tr>
    <td height='75' colspan='2'>$descrizione</td>
  </tr>
  <tr>
    <td>Contatto: <a href='mailto:$mail'>$mail</a></td>
    <td width='271' align='right'>Inserito il: $data</td>
  </tr>
</table>
<br />
<hr />
<br />";

     	$i++;
 						  }
		}
		elseif ($_GET['categoria'] == "Seleziona una categoria" && $_GET['provincia'] == "Seleziona una provincia") {
			
			echo "<b>Seleziona una categoria e/o una provincia.</b>";
			
		} else {

echo "<b>Non sono presenti annunci.</b>";

}

?>
    </div>
    <div id="footer"><?php include ('files/footer.html'); ?></div>
</div>
</body>
</html>
