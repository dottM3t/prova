	<?php

	require '../auth/db_connect.php';
		if($user['privileges']!=NULL && $user['privileges'] < 2 ){
			
		}

			else{ 	
					header('Location: ../auth/access_denied.php');
		}

	?>
<?php

include 'database/DBQuery.php';
?>

<form method="post" action="" id="crea">

	Inserisci il nome: <br> <input type="" name="nome" required> <br> <br>
	Scrivi descrizione breve: <br> <input name="d_short"
		value="<?php /* if (isset($_POST['d_short'])){echo htmlentities($_POST['d_short']);}*/?>"
		required> <br> <br> Scrivi descrizione estesa: <br> <textarea id="message" form="crea" name="d_estesa"> </textarea> <br> 

	Category: <br> <input type="" name="category" required> <br> <br>
	Type: <br> <input type="" name="type" required> <br> <br>
	Material: <br> <input type="" name="material" required> <br> <br>
	Weight: <br> <input type="" name="weight" required> <br> <br>
	Dimension: <br> <input type="" name="dimension" required> <br> <br>
	Scale of Damage: <br> <input type="" name="damage" required> <br> <br>
	Origin Place: <br> <input type="" name="origin_place" required> <br> <br>
	Storage Location: <br> <input type="" name="storage" required> <br> <br>
	Location: <br> <input type="" name="location" required> <br> <br>
	Original or copy (write one of the word): <br> <input type="" name="authentic" required> <br> <br>
	Restoration work: <br> <textarea id="message" form="crea" name="restoration"> </textarea> <br> 
	Deliverer: <br> <input type="" name="deliverer" required> <br> <br>
	Possessor: <br> <input type="" name="possessor" required> <br> <br>
	Owner: <br> <input type="" name="owner" required> <br> <br>

		<input type="submit" value="Inserisci">
</form>


<?php

	if(!empty($_POST['nome']) && !empty($_POST['d_short'])) {
	
		$_db = new DBQuery();
	
	if (!$_db->SelectByName( $_POST['nome'] )) {

		$_db->InsertOpera ($_POST['nome'], $_POST['d_short'], $_POST['d_estesa'], $_POST['category'],$_POST['type'],$_POST['material'],$_POST['weight'],$_POST['dimension'],$_POST['damage'],$_POST['origin_place'],$_POST['storage'],$_POST['location'],$_POST['authentic'],$_POST['restoration'],$_POST['deliverer'],$_POST['possessor'],$_POST['owner']);
	} else {
		
		trigger_error("<script type='text/javascript'>alert('L\'opera è già presente.');location.replace('crud_opera.php')</script>')", E_USER_ERROR);
			}
	
}else{
	
}
?>
