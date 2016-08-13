<?
use stats\models\StatsDAO;


class StatsDAOTest extends PHPUnit_Framework_TestCase
{
	protected $db;
	
	public function setup()
	{
	$db = new PDO('mysql:unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;dbname=baseball','root','root');
	$this->db = $db;
	}


	public function teardown()
	{
	$db = null;
	}

	public function testgetSqlById()
	 {
	 	$stats = new StatsDAO($this->db);
		$return = $stats->getSqlById('1');	
		$this->assertEquals(1, count($return));
	}


    public function testgetBySql() 
	{
		$newstats = new StatsDAO($this->db);
		$sql = " select * from stats ";
		$result = $newstats->getBySql($sql);
		$i = 0;
		if (is_array($result)){
		foreach ($result as $record){
		$i++;	
		}
	}
		$this->assertEquals(0,$i,"Results not equal");

	}

}