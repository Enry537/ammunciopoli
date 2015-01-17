<?php
// avviamo la sessione per continuare la precedente o crearne una nuova
@session_start();
if (@$_SESSION['login'] == null && @$_SESSION['id'] == null) {
	
// controlli aprire o no il mini login nel menu laterale
if ( $_SERVER['PHP_SELF'] != "/AMM/login.php" ) {
	if ( @$_GET['form'] == "open" ) {
		$form= "?form=close";
		} else {
			$form= "?form=open";
		}
	}
?>
	
<a href="<?=$form?>"><img src="files/img/ico_in.png" border="0" alt="Login" onmouseover="this.src='files/img/ico_inh.png'" onmouseout="this.src='files/img/ico_in.png'"/></a>
<a href="registrazione.php"><img src="files/img/ico_reg.png" border="0" alt="registrati" onmouseover="this.src='files/img/ico_regh.png'" onmouseout="this.src='files/img/ico_reg.png'"/></a>

<?php
	
	if ( @$_GET['form'] == "open" || (@$_GET['login'] == "success" && $_SERVER['PHP_SELF'] != "/AMM/login.php") ) {
		include ('files/form_Log.php');
		}
} else { 
	
	echo "Ciao <b>";
	echo $_SESSION['username'];
	echo "</b>";
?>

<a href="?logout=success"><img src="files/img/ico_out.png" border="0" alt="logout" onmouseover="this.src='files/img/ico_outh.png'" onmouseout="this.src='files/img/ico_out.png'"/></a>

<?php
	if ( @$_GET['logout'] == "success" ) {
	@session_start();//Distruggo la vecchia sessione
	session_unset();
	session_destroy();
	session_start();//Apro una nuova sessione
	header( "refresh:2;url={$_SERVER['PHP_SELF']}" ); 
}
}
?>

<hr />
<p>Cerca annunci</p>
          <form method="get" action="index.php" id="cerca">
          <label for="categoria">Categoria:</label>
		  <br />
            <p>
		 	<select name="categoria" >
              <option value="Seleziona una categoria">Seleziona una categoria</option>
                    <option value="Auto">Auto</option>
                    <option value="Moto">Moto</option>
                    <option value="Case">Case</option>
                    <option value="Altro">Altro</option>
          </select>
            </p>
		  <label for="provincia">Provincia:</label>
		  <br />
          <p>
		  <select name="provincia" >
           	  <option value="Seleziona una provincia">Seleziona una provincia</option>
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
	  
		    <p>
	        <input type="image" src="files/img/button_cer.jpg" border="0" alt="cerca" onmouseover="this.src='files/img/button_cerh.jpg'" onmouseout="this.src='files/img/button_cer.jpg';"/>
            <br />
		  </p>
          </form>
		  <hr />
             <p>Descrizione del progetto:
  </p>
</p>
          <p>Questa applicazione permette l'inserimento e la risposta di annunci proprio come sul noto sito di annunci italiano, i dati vengono inviati in un database su phpmyadmin e salvati dopo ogni modifica. </p>
