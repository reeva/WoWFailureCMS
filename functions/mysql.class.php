<?php
abstract class MySQL
{
	abstract private $_Instance;
	protected function runQuery();
	
	public function getInstance()
	{
		return $this->_Instance;
	}
	
	public function setInstance($instance)
	{
		$this->_Instance = $instance;
		return $this;
	}
	
	public function makeArgumentsSafe($arguments)
	{
		$result = array();
		foreach($arguments as $argument)
		{
			$result[] = $this->getInstance()->quote($argument); 
		}
		
		return $result;
	}
	
	public function prepareStatement($sql,$arguments)
	{
		$args = $this->makeArgumentsSafe($arguments);
		$stmn = $this->getInstance()->prepare($sql);
		for($i = 0; $i < count($args);$i++)
		{
			$stmn->bindValue($i+1,$args[$i]);
		}
		return $stmn;
	}
	
	public function runQuery($sql)
	{
		try{
			$this->getInstance()->beginTransaction()
								->exec($sql)
								->commit();
		}
		catch(PDOException $error)
		{
			$this->getInstance()->rollback();
			return $error->getCode();
		}
		
	}
	
	public function fetchResult($result)
	{
		if($result->rowCount() > 1)
		{
			return $result->fetch(PDO::FETCH_OBJ);
		}else {
			return $result->fetchAll(PDO::FETCH_OBJ);			
		}
	}
	
}

class Realm_Database extends MySQL
{
	private $_Instance;
	
	public function __construct($details)
	{
		$dbIdentifier = explode('_',get_class());
		$this->setInstance(new PDO("mysql:host='".$details['host'].";dbname=".$details[$dbIdentifier[0]], $details['username'], $details['password']));
	}
	
	public function __destruct()
	{
		$this->setInstance(NULL);
	}
	
	private function _generatePassword($username,$password)
	{
		return SHA1(mysql_real_escape_string($username).":".mysql_real_escape_string($password));
	}
	
	public function authorize($username,$password)
	{
		$result = $this->getInstance()->prepareStatement("SELECT id FROM `account` WHERE username='?' AND sha_pass_hash='?';",array($username,$this->_generatePassword($username,$password)));
		if($result->rowCount() <= 0){
			return FALSE;
		}else if($result->rowCount() == 1)
		{
			return $result->fetch(PDO::FETCH_OBJ)->id;
		}
	}
	
	public function registerAccount($username,$password,$email)
	{
		$registerDetails = $this->makeArgumentsSafe(array($username,$password,$email));
		if($this->runQuery("INSERT INTO `account` (username,sha_pass_hash,email) VALUES ('".$registerDetails[0]."','".$registerDetails[1]."','".$registerDetails[2]."');"))
		{
			return TRUE;
		}
	}
}

class Character_Database extends MySQL
{
	private $_Instance;
	
	public function __construct($details)
	{
		$dbIdentifier = explode('_',get_class());
		$this->setInstance(new PDO("mysql:host='".$details['host'].";dbname=".$details[$dbIdentifier[0]], $details['username'], $details['password']));
	}
	
	public function __destruct()
	{
		$this->setInstance(NULL);
	}
	
	public function getGuidByName($name)
	{
		$args = $this->makeArgumentsSafe($name);
		$result = $this->getInstance()->query("SELECT guid FROM `characters` WHERE name='".$args[0]."'");
		return $this->fetchResult($result)->guid;
	}
	
	public function getSlotForItem($itemId,$Guid)
	{
		$secure = $this->makeArgumentsSafe(array($itemId,$Guid));
		$slotId = $this->getInstance()->query("SELECT slot FROM `item_instance` INNER JOIN `character_inventory` ON `character_inventory`.`item`=`item_instance`.`guid` WHERE owner_guid=".$secure[0]." AND item_entry=".$secure[1]);
		return $this->fetchResult($slotId)->$slot;
	}
	
	public function getInfoFor($Guid)
	{
		$character = $this->prepareStatement("SELECT name,race,class,gender,level,health,power1,power2,power4,power5,power6,power8,power9,power10,equipmentCache FROM `characters` WHERE guid=?",$Guid);		
		return $this->fetchResult($character);
	}
}
class World_Database extends MySQL
{
	private $_Instance;
	
	public function __construct($details)
	{
		$dbIdentifier = explode('_',get_class());
		$this->setInstance(new PDO("mysql:host='".$details['host'].";dbname=".$details[$dbIdentifier[0]], $details['username'], $details['password']));
	}
	
	public function __destruct()
	{
		$this->setInstance(NULL);
	}
	
	public function getItemArmoryInfo($itemId)
	{
		$secure = $this->makeArgumentsSafe(array($itemId));
		$itemEntry = $this->runQuery("SELECT name,displayid,Quality FROM `item_template` WHERE enrty=".$secure[0]);
		return $this->fetchResult($itemEntry);
	}
}
?>