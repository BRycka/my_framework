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
				die('Could not connect');
			}
			if(!mysqli_select_db($this->db, $this->dbName)) {
				die('Could not select database');
			}
			$this->query("SET NAMES UTF8");
		}
	}

	public function query($sql)	{
		mysqli_query($this->db, $sql);
		if($this->error()) {
			die($this->error());
		}
		return mysqli_affected_rows($this->db);
	}

	public function error()	{
		return mysqli_error($this->db);
	}

	public function queryValue($sql) {
		$rEF = mysqli_query($this->db, $sql);
		if ($this->error())
			die($this->error());
		if ($rEF === false)
			return false;
		if (mysqli_num_rows($rEF)==0)
			return false;
		list($data)=mysqli_fetch_array($rEF, MYSQL_NUM);
		return $data;
	}

	public function queryRow($sql) {
		$rEF = mysqli_query($this->db, $sql);
		if ($this->error())
			die($this->error());
		if ($rEF === false)
			return false;
		if (mysqli_num_rows($rEF)==0)
			return false;
		$data = mysqli_fetch_assoc($rEF);
		return $data;
	}
	
	public function queryData($sql, $id=null) {
		$rEF = mysqli_query($this->db, $sql);
		if($this->error())
			die($this->error());
		if ($rEF === false)
			return false;
		if (mysqli_num_rows($rEF)==0)
			return false;
		$data = array();
		if ($id != null) {
			while($row = mysqli_fetch_assoc($rEF)){
				$data[$row[$id]] = $row;
			}
		} else {
			while($row = mysqli_fetch_assoc($rEF)){
				$data[]=$row;
			}
		}
		return $data;
	}

	public function deleteRow($table, $key = '', $value = '') {
		$sql = "DELETE FROM `" . $table . "` WHERE `" . $key . "` = '" . $this->escape($value) . "'";
		return $this->query($sql);
	}

	public function insertId() {
		return mysqli_insert_id($this->db);
	}

	public function errno()	{
		return mysqli_errno($this->db);
	}

	public function insertArray($table, $arr) {
		$tt = '';
		$query = "INSERT into `".$table."` (";

		foreach ($arr as $k=>$v) {
			$query .= "`".$k."`, ";
			if ($v === null) {
				$tt .= "NULL, ";
			} else {
				$tt .= "'". $this->escape($v)."', ";
			}
		}
		$query = substr($query, 0, -2);
		$query .= ") VALUES(".$tt;
		$query = substr($query, 0, -2);
		$query .= ")";
		return $this->query($query);
	}

	public function replaceArray($table, $arr) {
		$tt = '';
		$query = "REPLACE into `".$table."` (";

		foreach ($arr as $k=>$v) {
			$query .= $k.", ";
			$tt .= "'". $this->escape($v)."', ";
		}
		$query = substr($query, 0, -2);
		$query .= ") VALUES(".$tt;
		$query = substr($query, 0, -2);
		$query .= ")";
		return $this->query($query);
	}

	public function updateArray($table, $arr, $condarr) {
		if (empty($arr) || empty($condarr))
			die('Invalid parameters for updateArray');
		$query = "UPDATE `".$table."` SET ";

		foreach ($arr as $k=>$v)
			$query .= "`".$k."`='".$this->escape($v)."', ";
		$query = substr($query, 0, -2);
		$query .= " WHERE 1 ";

		foreach ($condarr as $k=>$v)
			$query .= " AND `".$k."`='".$this->escape($v) . "'";

		return $this->query($query);
	}

	public function selectArray($table, $arr=array(), $condarr=array(), $orderarr=array(), $limit = "") {
		$query = "SELECT ";

		if($arr && is_array($arr) && count($arr) > 0) {
			foreach ($arr as $v) $query .= $v.", ";
			$query = substr($query, 0, -2);
		} else {
			$query .= '*';
		}

		$query .= " FROM `".$table."` WHERE 1 ";

		if (!empty($condarr)) {
			foreach ($condarr as $k => $v) {
				if(is_int($k)) {
					$query .= " AND '".$v."' ";
				} else {
					if($v === null) {
						$query .= " AND `" . $k . "` IS NULL";
					} else {
						$query .= " AND `" . $k . "` = '" . $this->escape($v) . "'";
					}
				}
			}
		}

		if (!empty($orderarr)) {
			$query .= " ORDER BY ";
			foreach ($orderarr as $v) $query .= $v.", ";
			$query = substr($query, 0, -2);
		}
		if($limit) {
			$query .= ' LIMIT '.$limit;
		}

		return $this->queryData($query);
	}

	public function selectRow($table, $arr=array(), $condarr=array()) {
		$res = $this->selectArray($table, $arr, $condarr, array(), 1);
		if($res) {
			if(isset($res[0]))
				return $res[0];
		}
	}

	public function escape($val) {
		return mysqli_real_escape_string($this->db, $val);
	}
}
