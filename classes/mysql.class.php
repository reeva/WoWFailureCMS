<?php
abstract class MySQL
{
	protected $_Instance;
	
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
		if(is_array($arguments))
		{
			$result = array();
			foreach($arguments as $argument)
			{
				$result[] = $this->getInstance()->quote($argument); 
			}
		}else{
			$result = $this->getInstance()->quote($arguments);
		}
		return $result;
	}
	
	public function prepareStatement($sql,$arguments)
	{
		$stmn = $this->getInstance()->prepare($sql);
		if(is_array($arguments))
		{			
			for($i = 0; $i < count($arguments);$i++)
			{
				$stmn->bindValue($i+1,$arguments[$i]);
			}
		}else{
			$stmn->bindValue(1,$arguments);
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
		if(is_object($result)){
			if(1 < $result->rowCount())
			{
				return $result->fetchAll();
			}else{
				return $result->fetch(PDO::FETCH_LAZY);			
			}
		}else{
			var_dump($result);
		}
	}
	
}

class Realm_Database extends MySQL
{
	
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
	
	public function __construct($details)
	{
		$dbIdentifier = explode('_',get_class());
		$this->setInstance(new PDO("mysql:host=".$details['host'].";dbname=".$details[$dbIdentifier[0]], $details['username'], $details['password']));
	}
	
	public function __destruct()
	{
		$this->setInstance(NULL);
	}
	
	public function getGuidByName($name)
	{
		$arg = $this->makeArgumentsSafe($name);
		$result = $this->getInstance()->query("SELECT guid FROM `characters` WHERE name=".$arg);
		if($result)
		{
			return $this->fetchResult($result)->guid;
		}
	}
	
	public function getEquipedItems($Guid)
	{
		$itemsRaw = $this->fetchResult($this->getInstance()->query("SELECT itemEntry,slot FROM `item_instance` INNER JOIN `character_inventory` ON `character_inventory`.`item`=`item_instance`.`guid` WHERE owner_guid=".$this->makeArgumentsSafe($Guid)." AND slot <= 18 AND bag = 0 ORDER BY slot"));
        $items = array();
        foreach($itemsRaw as $item)
        {
            if(!in_array($item["itemEntry"],$itemsRaw))
            {
                $items[$item["slot"]] = $item;
            }
        }
        $result = array();
        for($i = 0; $i <= 18;$i++)
        {
            if(isset($items[$i]))
            {
                $result[$items[$i]["slot"]] = $items[$i];
            }else{
                $result[$i] = NULL;
            }
        }
        return $result;
	}
	
	public function getInfoFor($Guid)
	{
		$character = $this->prepareStatement("SELECT name,race,class,gender,level,health,power1,power2,power4,power5,power6,power7 FROM `characters` WHERE guid=?",$Guid);
		$character->execute();
		return $this->fetchResult($character);
	}
}
class World_Database extends MySQL
{

	public function __construct($details)
	{
		$dbIdentifier = explode('_',get_class());
		$this->setInstance(new PDO("mysql:host=".$details['host'].";dbname=".$details[$dbIdentifier[0]], $details['username'], $details['password']));
	}
	
	public function __destruct()
	{
		$this->setInstance(NULL);
	}
	
	public function getItemInfo($itemId)
	{
		$secure = $this->makeArgumentsSafe($itemId);
		$itemEntry = $this->getInstance()->query("SELECT entry,name,displayid,Quality,InventoryType FROM `item_template` WHERE entry=".$secure);
		return $this->fetchResult($itemEntry);
	}
}
?>