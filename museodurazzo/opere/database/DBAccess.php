<?php
class DBAccess {
	
	private $_conn = null;
	private $_localhost = 'localhost';
	private $_username = 'id2234012_admin';
	private $_password = 'admin';
	private $_database = 'id2234012_db_durazzo';
	private $_port = '3306';
	
	public function __construct() {
		if (is_null ( $this->_conn )) {
			
			$this->_conn = mysqli_connect ( $this->_localhost, $this->_username, $this->_password, $this->_database, $this->_port );
			if (! $this->_conn) {
				trigger_error("<script type='text/javascript'>alert('Cannot connect to database server');</script>')", E_USER_ERROR);
		
			}
			
		}
	}
	
	public function getConnection() {
		return $this->_conn;
	}
	
	public function closeConnection(){
		$this->_conn = null;
		//mysqli_close();
	}
}