<?
namespace stats\models;
//use \PDO;

class StatsDAO
{

	protected $db;
	public function __construct($db)
	{
	$this->db = $db;
	}
	
	public function getSqlById($id)
	 {
	$sql = "SELECT * from stats  WHERE id = ?";
	$sth = $this->db->prepare($sql);
	$sth->execute(array($id));
	$playerdata = $sth->fetch(); 
	return $playerdata;
	}


	public function getBySql($sql)
	 {
	$sth = $this->db->prepare($sql);
	$sth->execute();
	$playerdata = $sth->fetch(); 
	return $playerdata;
	}
}
?>