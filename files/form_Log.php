<?php

// includiamo il file di connessione al database
include ('configurazione.php');

if ($_SESSION['login'] == null && $_SESSION['id'] == null) {

// creiamo il nostro modulo di login
?>

<form action="?login=success" method="post">

	<p><b>Nome Utente</b><br />
	<input type="text" name="username"/>
	</p>
   
	<p><b>Password</b><br />
	<input type="password" name="password"/>
	</p>
  
	<p>
	<input type="image" src="files/img/1.jpg" alt="login" onmouseover="this.src='files/img/1h.jpg'" onmouseout="this.src='files/img/1.jpg'"/>
	<br />
	</p>

</form>

<?php

} else {

echo "<p><b>Esegui il logout per effettuare di nuovo l'accesso.</b> <br />
          <br />
          <a href='?logout=success'><img src='files/img/button_out.jpg' border='0' alt='logout' onmouseover=\"this.src='files/img/button_outh.jpg'\" onmouseout=\"this.src='files/img/button_out.jpg'\"></a></p>";

}

// attraverso un if controlliamo che il form sia stato inviato

if ( $_GET['login'] == "success" ) {

// recuperiamo i dati inviati con il form

$username = $_POST['username'];

$password = $_POST['password'];

// ora controlliamo che i campi siano stati tutti compilati

if ( $username == TRUE && $password == TRUE)  {

$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);	
$crypt_pass = md5($password);

$risultati = mysql_query("SELECT * FROM utenti WHERE user = '$username' AND pass = '$crypt_pass'");

$vettore = mysql_fetch_array($risultati);

$num = mysql_num_rows($risultati);

if ( $num == 1 ) {

		echo "<b>Complimenti $username login effettuato con successo.</b>";
		session_start();
		$_SESSION['login'] = "Yes";
		$_SESSION['id'] = $vettore['id'];
		$_SESSION['username'] = $vettore['user'];
		$_SESSION['mail'] = $vettore['mail'];

// messaggi da far visualizzare per conferma inserimento
 
}
else {

echo "<b>Username o password sbagliati</b>";

}

} else {

echo "<b>Username o password mancanti.</b>";

}

}

?>