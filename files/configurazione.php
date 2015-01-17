<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento senza titolo</title>
</head>

<body>
<?php
// connettiamoci il nostro database

$db_host = "mysql.netsons.com";
$db_user = "fsbqilay";
$db_password = "@147258@";
$db_name = "fsbqilay_annunciopoli";

//connetto il database
$db = mysql_connect($db_host, $db_user, $db_password) or die ('Errore durante la connessione');
mysql_select_db($db_name, $db) or die ('Errore durante la selezione del db');

?>
</body>
</html>