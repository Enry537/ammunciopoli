<?php
// includiamo il file di connessione al database
include ('configurazione.php');
if (@$_SESSION['login'] == null && @$_SESSION['id'] == null) {
// creiamo il nostro modulo di registrazione
?>

<form action="?registration=success" method="post">

	<p><b>Nome e Cognome</b><br />
	<input type="text" name="nome"/>
	</p>
  
	<p><b>Email</b><br />
	<input type="email" name="email"/>
	</p>
    
	<p><b>Nome Utente</b><br />
	<input type="text" name="username"/>
	</p>
    
	<p><b>Password</b><br />
	<input type="password" name="password"/>
	</p>
    
	<p><b>Ripeti Password</b><br />
	<input type="password" name="controllo_pass"/>
	</p>

	<p>
	<input type="image" src="files/img/button_reg.jpg" alt="completa registrazione" onmouseover="this.src='files/img/button_regh.jpg'" onmouseout="this.src='files/img/button_reg.jpg'"/>
	<br />
	</p>

</form>

<?php
} else {
echo "<p><b>Esegui il logout per registrare un nuovo utente.</b><br />
          <br />
          <a href='?logout=success'><img src='files/img/button_out.jpg' border='0' alt='logout' onmouseover=\"this.src='files/img/button_outh.jpg';\" onmouseout=\"this.src='files/img/button_out.jpg';\"/></a></p>";
}
// attraverso un if controlliamo che il form sia stato inviato
if ( @$_GET['registration'] == "success" ) {
// recuperiamo i dati inviati con il form
$nome = ucwords($_POST['nome']);
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$controllo_pass = $_POST['controllo_pass'];
// ora controlliamo che i campi siano stati tutti compilati
if ( $nome == TRUE && $email == TRUE && $username == TRUE && $password == TRUE && $controllo_pass == TRUE )  {
// controlliamo se l'mail è presente già nel database
$sql = mysql_query("SELECT * FROM utenti WHERE mail = '$email'") or die ("Mail già occupata");
$num = mysql_num_rows($sql);
if ( $num == 0 ) {
$num = null;
// controlliamo se l'mail è presente già nel database
$sql = mysql_query("SELECT * FROM utenti WHERE user = '$username'") or die ("Nome utente già occupato");
$num = mysql_num_rows($sql);
if ( $num == 0 ) {
// ora controlliamo che le password inserite siano identiche
if ( $password == $controllo_pass ) {
$nome = mysql_real_escape_string($nome);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// infine criptiamo la password con md5
$crypt_pass = md5($password);
mysql_query("INSERT INTO utenti
             (id , nome , mail , user , pass )
             VALUES
             ('', '$nome', '$email', '$username', '$crypt_pass' )") OR DIE(mysql_error());
// e inviamo una mail con la riuscita registazione
mail ($mail, "Registrazione OK", "Complimenti registrazione effettuata con successo", "From: tuamail@host.formato");
// messaggi da far visualizzare all'utente finale
echo "<b>Complimenti registrazione effettuata con successo.</b>";
} else {
echo "<b>Le password non corrispondono</b>";
}
} else {
echo "<b>Nome utente già utilizzato.</b>";
}
} else {
echo "<b>Indirizzo mail già utilizzato.</b>";
}
} else {
echo "<b>Tutti i campi sono obbligatori.";
}
}
?>
