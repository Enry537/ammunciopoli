<?php
// includiamo il file di connessione al database
include ('configurazione.php');
if ($_SESSION['login'] == "Yes" && $_SESSION['id'] != null) {
// creiamo il nostro modulo di registrazione
?>

<form action="?insert=success" method="post">

  <p><b>Titolo</b><br />
  <input type="text" name="titolo"/>
  </p>
  
  <p><b>Categoria</b><br />
    <select name="categoria">
      <option value="Seleziona una voce">Seleziona una voce</option>
      <option value="Auto">Auto</option>
      <option value="Moto">Moto</option>
      <option value="Case">Case</option>
      <option value="Altro">Altro</option>
    </select>
  </p>
  
  <p><b>Provincia</b><br />
    <select name="provincia">
      <option value="Seleziona una voce">Seleziona una voce</option>
      <option value="Cagliari">Cagliari</option>
      <option value="Gallura">Gallura</option>
      <option value="Medio Campidano">Medio Campidano</option>
      <option value="Nuoro">Nuoro</option>
      <option value="Oristano">Oristano</option>
      <option value="Ogliastra">Ogliastra</option>
      <option value="Sassari">Sassari</option>
      <option value="Sulcis">Sulcis</option>                
    </select>
  </p>
  
  <p><b>Prezzo</b><br />
    <input type="number" name="prezzo" size="10"/>
</p>

  <p><b>Descrizione</b><br />
    <textarea name="descrizione" cols="28" rows="5"></textarea>
</p>

  <p>
    <input type="image" src="files/img/button_ins.jpg" alt="completa inserimento" onmouseover="this.src='files/img/button_insh.jpg';" onmouseout="this.src='files/img/button_ins.jpg';"/>
    <br />
  </p>

</form>

<?php
} else {
echo "<p><b>Esegui l'accesso o la registrazione per poter inserire un annuncio.</b> <br />
          <br />
          <a href='login.php'><img src='files/img/1.jpg' border='0' alt='login' onmouseover=\"this.src='files/img/1h.jpg'\" onmouseout=\"this.src='files/img/1.jpg'\"/></a><br />
  <br />
  <a href='registrazione.php'><img src='files/img/2.jpg' border='0' alt='registrazione' onmouseover=\"this.src='files/img/2h.jpg'\" onmouseout=\"this.src='files/img/2.jpg'\"/></a></p>
<p>&nbsp;</p>";
}
// attraverso un if controlliamo che il form sia stato inviato
if ( @$_GET['insert'] == "success" ) {
// recuperiamo i dati inviati con il form
$titolo = ucfirst($_POST['titolo']);
$categoria = $_POST['categoria'];
$provincia = $_POST['provincia'];
$prezzo = $_POST['prezzo'];
$descrizione = ucfirst($_POST['descrizione']);
$mail = $_SESSION['mail'];
// ora controlliamo che i campi siano stati tutti compilati
if ( $titolo == TRUE && $categoria == TRUE && $provincia == TRUE && $prezzo == TRUE && $descrizione == TRUE && $mail == TRUE )  {
// controlliamo se il titolo è presente già nel database
$sql = mysql_query("SELECT * FROM annunci WHERE titolo = '$titolo'") or die ("Titolo già esistente");
$num = mysql_num_rows($sql);
if ( $num == 0 ) {
// infine criptiamo la password con md5
$pass_md5 = md5($pass1);
$nickname = mysql_real_escape_string($nickname);
$nome = mysql_real_escape_string($nome);
mysql_query("INSERT INTO annunci
             (id, titolo , categoria , provincia , prezzo , descrizione , mail, data )
             VALUES
             ('', '$titolo', '$categoria', '$provincia', '$prezzo', '$descrizione', '$mail', CURRENT_TIMESTAMP )") OR DIE(mysql_error());
// e inviamo una mail con la riuscita registazione
mail ($mail, "Annuncio inserito", "Complimenti annuncio inserito con successo", "From: tuamail@host.formato");
// messaggi da far visualizzare per conferma inserimento
echo "<b>Complimenti annuncio inserito con successo.</b>";
 
}
else {
echo "<b>Titolo già utilizzato.</b>";
}
} else {
echo "<b>Tutti i campi sono obbligatori.</b>";
}
}
?>
