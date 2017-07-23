<?php
// per prima cosa verifico che il file sia stato effettivamente caricato
	if (!isset($_FILES['userfile']) || !is_uploaded_file($_FILES['userfile']['tmp_name'])) {
  		echo 'Non hai inviato nessun file...';
		trigger_error("<script type='text/javascript'>alert('Non hai inviato nessun file...');location.replace('uploaddb.php')</script>')", E_USER_ERROR);
	}

//percorso della cartella dove mettere i file caricati dagli utenti
$uploaddir = '../museodurazzo/dbfile/';

//Recupero il percorso temporaneo del file
$userfile_tmp = $_FILES['userfile']['tmp_name'];

//recupero il nome originale del file caricato
$userfile_name = $_FILES['userfile']['name'];

//copio il file dalla sua posizione temporanea alla mia cartella upload
if (move_uploaded_file($userfile_tmp, $uploaddir . $userfile_name)) {
  //Se l'operazione è andata a buon fine...
	trigger_error("<script type='text/javascript'>alert('File uploaded succesfully');location.replace('museum_manager.php')</script>')", E_USER_ERROR);

}else{
  //Se l'operazione è fallta...
  echo 'Upload NON valido!'; 
}

$ext_ok = array('sql');
$temp = explode('.', $_FILES['userfile']['name']);
$ext = end($temp);
if (!in_array($ext, $ext_ok)) {
  echo 'Il file ha un estensione non ammessa!';
  header('Location: museum_manager.php');
}
?>