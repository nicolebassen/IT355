<?php

class FixtureTestCase extends PHPUnit_Extensions_Database_TestCase {
 

   public $fixtures = array(
		'statsfixtures',
	);
	
	private $conn = null;
 
	public function setUp() {
		$conn = $this->getConnection();
		$pdo = $conn->getConnection();
 
		// set up tables
		    $fixtureDataSet = $this->getDataSet();
			$table = $fixtureDataSet->getTableNames()[0];
			// drop table
			$pdo->exec("DROP TABLE IF EXISTS `$table`;");
			// recreate table
			$meta = $fixtureDataSet->getTableMetaData($table);
			$create = "CREATE TABLE IF NOT EXISTS `$table` ";
			$cols = array();
			foreach ($meta->getColumns() as $col) {
				$cols[] = "`$col` VARCHAR(200)";
			}
			$create .= '('.implode(',', $cols).');';
			$pdo->exec($create);
			parent::setUp();
	}
 
/*
	public function tearDown() {
		$table = $this->getDataSet()->getTableNames()[0];
			// drop table
		$conn = $this->getConnection();
		$pdo = $conn->getConnection();
		$pdo->exec("DROP TABLE IF EXISTS `$table`");
		parent::tearDown();
	}
	*/
 
	public function getConnection() {
		if ($this->conn === null) {
			try {
 			    $pdo = new PDO('mysql:unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;dbname=baseball','root','root');
				$this->conn = $this->createDefaultDBConnection($pdo, 'baseball');
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		return $this->conn;
	}
 
	public function getDataSet() {
		$compositeDs = new PHPUnit_Extensions_Database_DataSet_CompositeDataSet(array());
		$fixturePath = dirname(__FILE__) . DIRECTORY_SEPARATOR;
		$path =  $fixturePath . DIRECTORY_SEPARATOR . "statsfixtures.xml";
		$ds = $this->createMySQLXMLDataSet($path);
		$compositeDs->addDataSet($ds);
		return $compositeDs;
	}
	
 
	public function loadDataSet($dataSet) {
		$this->getDatabaseTester()->setDataSet($dataSet);
		$this->getDatabaseTester()->onSetUp();
	}


	function testReadDatabase() {
		$conn = $this->getConnection()->getConnection();
		// fixtures auto loaded, let's read some data
		$query = $conn->query('SELECT * FROM statstest');
		$results = $query->fetchAll(PDO::FETCH_COLUMN);
		$this->assertEquals(4, count($results));

		// now delete them
		$conn->query('TRUNCATE statstest');

		$query = $conn->query('SELECT * FROM statstest');
		$results = $query->fetchAll(PDO::FETCH_COLUMN);
		$this->assertEquals(0, count($results));

		// now reload them
		$ds = $this->getDataSet();
		$this->loadDataSet($ds) ;

		$query = $conn->query('SELECT * FROM statstest');
		$results = $query->fetchAll(PDO::FETCH_COLUMN);
		$this->assertEquals(4, count($results));
	}


	 public function testVerifyingData(){
        $alldbdata = $this->getConnection()->createDataSet();
        $this->assertEquals(4, $alldbdata->getTable('statstest')->getRowCount());  
        $actualRow = $alldbdata->getTable('statstest')->getRow(0);
        var_dump($actualRow['Bio']);
        $this->assertEquals('Great Glove', $actualRow['Bio']);
  	}

  	public function testDeleteById(){
		$conn = $this->getConnection()->getConnection();
		$conn->query('delete FROM statstest where id = 1');

		//$ds = $this->getDataSet();
		//$this->loadDataSet($ds) ;

		$query = $conn->query('SELECT * FROM statstest');
		$results = $query->fetchAll(PDO::FETCH_COLUMN);
		$this->assertEquals(3, count($results));
  	}

  	//the next step is to mirror our more of our crud methods in DAOStats.php


}