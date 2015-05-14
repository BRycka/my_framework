<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.25
 */

abstract class Core_Model {

	protected $dbHost;
	protected $dbUser;
	protected $dbPassword;
	protected $dbName;
	protected $db;

	public function __construct() {
		$this->dbHost = DB_HOST;
		$this->dbUser = DB_USER;
		$this->dbPassword = DB_PASSWORD;
		$this->dbName = DB_NAME;
		$this->init();
	}

	protected function init() {
		if(!$this->db) {
			$this->db = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword);
			if(!$this->db) {
//				throw new Exception('Could not connect');
				die('Could not connect');
			}
			if(!mysqli_select_db($this->db, $this->dbName)) {
//				throw new Exception('Could not select database');
				die('Could not select database');
			}
			$this->query("SET NAMES UTF8");
		}
	}

	public function query($sql)	{
		mysqli_query($this->db, $sql);
		if($this->error()) {
			throw new Exception($this->error());
		}
		return mysqli_affected_rows($this->db);
	}

	public function error()	{
		return mysqli_error($this->db);
	}
}
