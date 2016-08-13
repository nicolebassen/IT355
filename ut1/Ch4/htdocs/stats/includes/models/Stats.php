<?php

class Stats
{	
	public $id;
	public $YR;
	public $Fullname;
	public $GP;
	public $AB;
	public $R;
	public $H;
	public $HR;
	public $RBI;
	public $Salary;
	public $Bio;


	public static function getBySql($sql) 
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			// Execute database query
			$statement = $database->query($sql);
			
			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetchAll();
			
			// Close database resources
			$database = null;
			
			// Return results
			return $result;
		}
		catch (PDOException $exception) 
		{
			die($exception->getMessage());
		}		
	}
	
	public static function getAll() 
	{
		//$sql = 'select * from stats';

		$sql = 'select * from players';

		return self::getBySql($sql);				
	}

	public static function getById($id) 
	{
		try
		{
			// Open database connection           
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
			// Build database statement
			$sql = "select players.player,stats.id,stats.YR,stats.GP,stats.AB,stats.R,stats.H,stats.HR,stats.RBI,stats.Salary,stats.Bio from players,stats 
where stats.Playerid = players.id
and players.id = :id";
			$statement = $database->prepare($sql);
			$statement->bindParam(':id', $id, PDO::PARAM_INT);			
						
			// Execute database statement
			$statement->execute();
			
			// Fetch results from cursor
			$statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
			$result = $statement->fetch();
	
			// Close database resources
			$database = null;
			
			// Return results
			return $result;
		}	
		catch (PDOException $exception) 
		{
			die($exception->getMessage());
		}
	}


	public function playercheck($fullname){
			$database = new Database();
			$checksql = "select id from players where player = :player";
			$statement = $database->prepare($checksql);
			$statement->bindParam(':player', $fullname, PDO::PARAM_STR);
			$statement->execute();
			$idresult = $statement->fetch();
			return $idresult;
	}


	//will be renamed to private after test
	public function insert() 
	{	
		try
		{
			// Open database connection
			$database = new Database();
			
			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$playerid = $this->playercheck($this->Fullname);
			if (!$playerid){
				$insplayer = "insert into players (player) values (:player)";
				$insstatement = $database->prepare($insplayer);
			    $insstatement->bindParam(':player', $this->Fullname, PDO::PARAM_STR);
			    $insstatement->execute();
			    $playerid = $database->lastInsertId();
			}

			// Build database statement
			$sql = "insert into stats (YR,Playerid,GP,AB,R,H,HR,RBI,Salary,Bio) values (:YR,:Playerid,:GP,:AB,:R,:H,:HR,:RBI,:Salary,:Bio)";
			$statement = $database->prepare($sql);
			$statement->bindParam(':YR', $this->YR, PDO::PARAM_INT);
			$statement->bindParam(':Playerid', $playerid, PDO::PARAM_INT);
			$statement->bindParam(':GP', $this->GP, PDO::PARAM_INT);
			$statement->bindParam(':AB', $this->AB, PDO::PARAM_INT);
			$statement->bindParam(':R', $this->R, PDO::PARAM_INT);
			$statement->bindParam(':H', $this->H, PDO::PARAM_INT);
			$statement->bindParam(':HR', $this->HR, PDO::PARAM_INT);
			$statement->bindParam(':RBI', $this->RBI, PDO::PARAM_INT);
			$statement->bindParam(':Salary', $this->Salary, PDO::PARAM_STR);
			$statement->bindParam(':Bio', $this->Bio, PDO::PARAM_STR);
			// Execute database statement
			$statement->execute();
			
			// Get affected rows
			$count = $statement->rowCount();
			
			// Close database resources
			$database = null;
			
			// Return affected rows
			return $count;
		}
		catch (PDOException $exception) 
		{
			die($exception->getMessage());
		}			
	}
	//will be changed to private after testing
	public function update() 
	{
		try
		{
			// Open database connection
			$database = new Database();
			
			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database query
			$sql = "update stats set GP=:GP,AB=:AB,R=:R,H=:H,HR=:HR,RBI=:RBI,Salary=:Salary,Bio = :Bio where id = :id";
			
			// Build database statement
			$statement = $database->prepare($sql);
			$statement->bindParam(':GP', $this->GP, PDO::PARAM_INT);
			$statement->bindParam(':AB', $this->AB, PDO::PARAM_INT);
			$statement->bindParam(':R', $this->R, PDO::PARAM_INT);
			$statement->bindParam(':H', $this->H, PDO::PARAM_INT);
			$statement->bindParam(':HR', $this->HR, PDO::PARAM_INT);
			$statement->bindParam(':RBI', $this->RBI, PDO::PARAM_INT);
			$statement->bindParam(':Salary', $this->Salary, PDO::PARAM_STR);
			$statement->bindParam(':Bio', $this->Bio, PDO::PARAM_STR);
			$statement->bindParam(':id', $this->id, PDO::PARAM_INT);
			
			// Execute database statement
			$statement->execute();
			
			// Get affected rows
			$count = $statement->rowCount();
			
			// Close database resources
			$database = null;
			
			// Return affected rows
			return $count;
		}
		catch (PDOException $exception) 
		{
			die($exception->getMessage());
		}
	}

	public function delete() 
	{
		try
		{
			// Open database connection
			$database = new Database();
			
			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "delete from stats where id = :id limit 1";
			$statement = $database->prepare($sql);
			$statement->bindParam(':id', $this->id, PDO::PARAM_INT);
			
			// Execute database statement
			$statement->execute();
			
			// Get affected rows
			$count = $statement->rowCount();
			
			// Close database resources
			$database = null;
			
			// Return affected rows
			return $count;
		}
		catch (PDOException $exception) 
		{
			die($exception->getMessage());
		}
	}
	
	public function save() 
	{
		// Check object for id
		if (isset($this->id)) {	
		
			// Return update when id exists
			return $this->update();
			
		} else {
		
			// Return insert when id does not exists
			return $this->insert();
		}
	}	
}