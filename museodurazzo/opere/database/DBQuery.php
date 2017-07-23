<?php
require_once 'DBAccess.php';

class DBQuery{
	
	private $mysqli;
	
	public function __construct(){
		$this->mysqli= new DBAccess();
	}
	
	public function getMysqli(){
		
		return $this->mysqli;
	}

	public function SelectAll() {
		$query= 'select * from opere_arte';
        return mysqli_query($this->mysqli->getConnection(), $query);
    }
    	
	public function SelectAllImg() {
		$query="select img from opere_arte where flag = 1";
		return mysqli_query($this->mysqli->getConnection(), $query);
    }
	
	public function SelectAllLimit() {
		$query="select * from opere_arte WHERE flag = '1' order by codice_interno desc limit 3";
		return mysqli_query($this->mysqli->getConnection(), $query);
    }
    
    public function SelectByName($name) {
    	$conn = $this->mysqli->getConnection();
    	$name = $conn->real_escape_string($name);
    	$query = "SELECT * FROM opere_arte WHERE nome = '$name'";
    	$_result = mysqli_query ( $this->mysqli->getConnection (), $query );
    	$_num_rows = $_result->fetch_row ();
    	
    	if ($_num_rows > 0) {
    		$_check = true;
    	} else {
    		$_check = false;
    	}
    	
    	return $_check;
    }
	
	public function SelectOperaResult($alter_cod) {
		$query = "SELECT * FROM opere_arte WHERE codice_interno = '$alter_cod'";
		return  mysqli_query ( $this->mysqli->getConnection (), $query );
	}
	
	public function SelectAudioPath($id){
		$query="SELECT nome, audio FROM opere_arte WHERE codice_interno='$id'";
		return mysqli_query($this->mysqli->getConnection(), $query);
	}
	
	public function SelectImagePath($id){
		$query="SELECT nome, img FROM opere_arte WHERE codice_interno='$id'";
		return mysqli_query($this->mysqli->getConnection(), $query);
	}
	
	public function SelectFlag($id){
		$query="SELECT flag FROM opere_arte WHERE codice_interno='$id'";
		return mysqli_query($this->mysqli->getConnection(),$query);
	}
	
	public function InsertOpera($name, $short, $estesa, $category, $type, $material, $weight, $dimension, $damage, $origin_place, $storage, $location, $authentic, $restoration, $deliverer, $possessor, $owner) {
		$conn = $this->mysqli->getConnection();
		$estesa = $conn->real_escape_string($estesa);
		$short = $conn->real_escape_string($short);
		$name = $conn->real_escape_string($name);
		$category = $conn->real_escape_string($category);
		$type = $conn->real_escape_string($estesa);
		$material = $conn->real_escape_string($material);
		$weight = $conn->real_escape_string($weight);
		$dimension = $conn->real_escape_string($dimension);
		$damage = $conn->real_escape_string($damage);
		$origin_place = $conn->real_escape_string($origin_place);
		$storage = $conn->real_escape_string($storage);
		$location = $conn->real_escape_string($location);
		$authentic = $conn->real_escape_string($authentic);
		$restoration = $conn->real_escape_string($restoration);
		$deliverer = $conn->real_escape_string($deliverer);
		$possessor = $conn->real_escape_string($possessor);
		$owner = $conn->real_escape_string($owner);

		$query = "INSERT INTO opere_arte(codice_interno, nome, d_short, d_estesa, category, type, material, weight, dimension, damage, origin_place, storage, location, authentic, restoration, deliverer, possessor, owner) VALUES ('', '$name', '$short', '$estesa', '$category', '$type', '$material', '$weight', '$dimension', '$damage', '$origin_place', '$storage', '$location', '$authentic', '$restoration', '$deliverer', '$possessor', '$owner')";
		return mysqli_query( $this->mysqli->getConnection (), $query );
	}
	

	public function UpdateOpera($alter_cod, $alter_name, $alter_short, $alter_estesa ,$alter_category, $alter_type, $alter_material, $alter_weight, $alter_dimension, $alter_damage, $alter_origin_place, $alter_storage, $alter_location, $alter_authentic, $alter_restoration, $alter_deliverer, $alter_possessor, $alter_owner) {
		$conn = $this->mysqli->getConnection();
		$alter_name = $conn->real_escape_string($alter_name);
		$alter_short = $conn->real_escape_string($alter_short);
		$alter_estesa = $conn->real_escape_string($alter_estesa);
		$alter_category= $conn->real_escape_string($alter_category);
		$alter_type=$conn->real_escape_string($alter_type);
		$alter_material=$conn->real_escape_string($alter_material);
		$alter_weight=$conn->real_escape_string($alter_weight);
		$alter_dimension=$conn->real_escape_string($alter_dimension);
		$alter_damage=$conn->real_escape_string($alter_damage);
		$alter_origin_place=$conn->real_escape_string($alter_origin_place);
		$alter_storage=$conn->real_escape_string($alter_storage);
		$alter_location=$conn->real_escape_string($alter_location);
		$alter_authentic=$conn->real_escape_string($alter_authentic);
		$alter_restoration=$conn->real_escape_string($alter_restoration);
		$alter_deliverer=$conn->real_escape_string($alter_deliverer);
		$alter_possessor=$conn->real_escape_string($alter_possessor);
		$alter_owner=$conn->real_escape_string($alter_owner);


		$query = "UPDATE opere_arte SET nome = '$alter_name', d_short = '$alter_short', d_estesa = '$alter_estesa', category = '$alter_category', type = '$alter_type', material = '$alter_material', weight = '$alter_weight', dimension = '$alter_dimension', damage = '$alter_damage', origin_place = '$alter_origin_place', storage = '$alter_storage', location = '$alter_location', authentic = '$alter_authentic', restoration = '$alter_restoration', deliverer = '$alter_deliverer', possessor = '$alter_possessor', owner = '$alter_owner' WHERE codice_interno = '$alter_cod'";
		return mysqli_query ( $this->mysqli->getConnection (), $query );
	}
	
	public function UpdateAudioPath($row, $audio_path,$id){
		$conn = $this->mysqli->getConnection();
		$audio_path = $conn->real_escape_string($audio_path);
		$query="UPDATE opere_arte SET ".$row." = '$audio_path' WHERE codice_interno = '$id'";
		mysqli_query($this->mysqli->getConnection(),$query);
	}
	
	public function UpdateImagePath($row, $image_path,$id){
		$conn = $this->mysqli->getConnection();
		$image_path = $conn->real_escape_string($image_path);
		$query="UPDATE opere_arte SET ".$row." = '$image_path' WHERE codice_interno = '$id'";
		mysqli_query($this->mysqli->getConnection(),$query);
	}
	
	public function UpdateQRCodePath($qrcode_path,$id){
		$conn = $this->mysqli->getConnection();
		$qrcode_path = $conn->real_escape_string($qrcode_path);
		$query="UPDATE opere_arte SET qr_code = '$qrcode_path' WHERE codice_interno = '$id'";
		mysqli_query($this->mysqli->getConnection(),$query);
	}
	
	public function UpdateFlag($id){
		$query="Update opere_arte set flag = 1 where codice_interno='$id'";
		return mysqli_query($this->mysqli->getConnection(),$query);
	}
	
	public function HideFlag($id){
		$query="UPDATE opere_arte SET flag = 0 WHERE codice_interno = '$id'";
		mysqli_query($this->mysqli->getConnection(),$query);
	}
	

	public function DeleteOpera($delete_cod) {
		$query = "DELETE FROM opere_arte WHERE codice_interno = '$delete_cod'";
		return mysqli_query( $this->mysqli->getConnection(), $query );
	}
	
	public function DeleteAudioPath($id){
		$query="UPDATE opere_arte SET audio = NULL WHERE codice_interno = '$id'";
		mysqli_query($this->mysqli->getConnection(), $query);
	}
	
	public function DeleteImagePath($id){
		$query="UPDATE opere_arte SET img = NULL WHERE codice_interno = '$id'";
		mysqli_query($this->mysqli->getConnection(), $query);
	}

	public function SelectUser() {
		$query= 'SELECT id, username, privileges FROM utenti';
		return mysqli_query($this->mysqli->getConnection(), $query);
	}
	public function SelectUserId($alter_id) {
		$query = "SELECT username, privileges FROM utenti WHERE id = '$alter_id'";
		return  mysqli_query ( $this->mysqli->getConnection (), $query );
	}

	public function UpdateUserPrivileges($alter_id, $alter_privileges) {
		$conn = $this->mysqli->getConnection();
		$alter_privileges = $conn->real_escape_string($alter_privileges);

		$query = "UPDATE utenti SET privileges = '$alter_privileges' WHERE id = '$alter_id'";
		return mysqli_query ( $this->mysqli->getConnection (), $query );
	}

	public function newMuseum(){
		$conn = $this->mysqli->getConnection();
		$newDB = "DELETE * FROM opere_arte, utenti";
		return mysqli_query( $this->mysqli->getConnection(), $newDB);
	}
}


