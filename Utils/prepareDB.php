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
        $this->collectSqlFiles();
    }

    protected function collectSqlFiles() {
        $structureDir = BASE_PATH . '/Help/Database/DBStructure';
        $dataDir = BASE_PATH . '/Help/Database/DBData';

        $structureFiles = scandir($structureDir);
        $dataFiles = scandir($dataDir);

        $this->runSqlFromFile($structureFiles, 'DBStructure');
        $this->runSqlFromFile($dataFiles, 'DBData');

        echo "Done";
    }

    public function runSqlFromFile($filePath, $type) {
        foreach ($filePath as $value) {
            if ($value != '.' && $value != '..') {
                $command = "mysql -u{$this->dbUser} -p{$this->dbPassword} "
                    . "-h {$this->dbHost} -D {$this->dbName} < " . DATABASE_FILES_PATH . '/' . $type . '/' . $value;

                shell_exec($command);
            }
        }
    }
}

new prepareDB();
