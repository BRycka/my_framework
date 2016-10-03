<?php
/**
 * Created by PhpStorm.
 * User: Ricardas
 * Date: 18/08/16
 * Time: 09:59
 */

require_once '../Help/config.php';

class prepareDB {
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
	    $this->resetDb();
        $this->collectAndRunSqlFiles();
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

    protected function collectAndRunSqlFiles() {
        $structureDir = BASE_PATH . '/Help/Database/DBStructure';
        $dataDir = BASE_PATH . '/Help/Database/DBData';

        $structureFiles = scandir($structureDir);
        $dataFiles = scandir($dataDir);

	    foreach ($structureFiles as $file) {
		    $this->runSqlFromFile($structureDir . '/' . $file);
	    }

	    foreach ($dataFiles as $file) {
		    $this->runSqlFromFile($dataDir . '/' . $file);
	    }

        echo "Done";
    }

	public function runSqlFromFile($filename) {
		$this->init();

		$contents = explode(";\n", trim(file_get_contents($filename)));

		try {
			foreach ($contents as $line) {
				if (strlen($line) > 0) {
					$this->query($line);
				}
			}
		} catch (Exception $e) {
			exit(500);
		}
	}

	public function resetDb() {
		if(!$this->db) {
			$this->db = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword);
			if(!$this->db) {
				die('Could not connect');
			}
			$this->query("SET NAMES UTF8");
		}

		$sql = 'DROP DATABASE IF EXISTS ' . $this->dbName;
		$this->query($sql);

		$sql = 'CREATE DATABASE ' . $this->dbName . ' DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci';
		$this->query($sql);

		mysqli_close($this->db);
		$this->db = false;
	}
}

new prepareDB();
