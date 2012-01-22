<?php
require('mysql.class.php');
require('wowheadparser.php');
class Factory_Armory
{
	public function createCharacter($charName)
	{
		
	}
}
abstract class Armory
{
	protected $_objectId;
	protected $_objectInfo;
	abstract private $_charDb;
	abstract function run();
	
	public function __construct($id)
	{
		$this->_objectId = $id;
	}
	
	public function getObjectId()
	{
		return $this->_objectId;
	}
	
	public function setObjectId($id)
	{
		$this->_objectId = (int) $id;
		return $this;
	}
	
	public function getObjectInfo()
	{
		return $this->_objectInfo;
	}
	
	public function setObjectInfo($info)
	{
		$this->_objectInfo = $info;
		return $this;
	}
	
	public function getCharDb()
	{
		return $_charDb;
	}
	
	public function setCharDb($pdo)
	{
		$this->_charDb = $pdo;
		return $this;
	}
	
	public function getWorldDb()
	{
		return $this->_worldDb;
	}
	
	public function setWorldDb($pdo)
	{
		$this->_worldDb = $pdo;
		return $this;
	}
	
}
class Armory_Character extends Armory
{
	private $_charDb;
	private $_worldDb;
	
	public function __construct($name)
	{
		$this->setCharDb(new Character_Database(array('host' => 'localhost','username' => 'root','password'=>'kabeli',ucfirst('character') => 'characters')));
		$this->setWorldDb(new World_Database(array('host' => 'localhost','username' => 'root','password'=>'kabeli',ucfirst('world') => 'world')));
		$this->setObjectId($this->getCharDb()->getGuidByName($name));
		$this->setObjectInfo($this->getCharDb()->getInfoFor($this->getObjectId()));
	}
	
	private function _parseEquipmentCache($cache)
	{
		$items = explode(" ",$cache);
		$result = array();
		for($i = 0; $i < count($result); $i++)
		{
			$item_itr = $i * 2;
			//$enchant_id = $i + 1;
			if($items[$item_id] === "0")
			{
				$result[] = $this->_fillEmpty($i);
			}else{
				$result[] = array($items[$item_itr],new wowheadparser($item_id),$this->getCharDb()->getSlotForItem($item_id,$this->getObjectId()));
			}
		}
		return $result;
	}
	
	private function _getWeaponForClass($class)
	{
		$result;
		switch ($class)
		{
			case 1:		$result = array(17,14,15); break;
			case 2: 	$result = array(17,14,28); break;
			case 3:		$result = array(21,22,15); break;
			case 4:		$result = array(21,22,25); break;
			case 8:
			case 9:
			case 5:		$result = array(21,23,26); break;
			case 11:
			case 6:		$result = array(21,22,28); break;
			case 7: 	$result = array(21,22,26); break;
		}
		return $result;
	}
	
	private function _fillEmpty($iterator)
	{
		$id = $iterator / 2;
		$slot = 0;
		switch($id)
		{
			case 10:
			case 11:
				global $slot;
				$slot = 11;
				break;
			case 12:
			case 13:
				global $slot;
				$slot = 12;
				break;
			case 15:
			case 16:
			case 17:
				global $slot;
				$weapons = $this->_getWeaponForClass($this->getObjectInfo()->class);
				$slot = $weapons[$id - 15];
				break;
			default:
				global $slot;
				$slot = $id +1;
				break;
		}
		return array(NULL,NULL,$slot);
		
	}
	
	private function _viewItems($input)
	{
		for($i = 0; $i < count($input); $i++)
		{
			$slot = 0;
			if($i == 3)
			{
				$id = 14;
				$slot = 16;
			}else{
				$slot = $input[$i][2];
			}
			echo '<div data-id="'.$i.'" data-type="'.$slot.'" class="slot slot-'.$slot.' item-quality-4" style=" left: 0px; top: 174px;"><div class="slot-inner"><div class="slot-contents"><a href="/wow/en/item/77096" class="item" data-item="e=4072&g0=52236"><img src="http://eu.media.blizzard.com/wow/icons/56/inv_misc_cape_deathwingraid_d_03.jpg" alt="" /><span class="frame"></span></a>
					<div class="details">
						<span class="name-shadow">Woundlicker Cover</span>
						<span class="name color-q4"><a href="/wow/en/item/77096" data-item="e=4072&g0=52236">Woundlicker Cover</a></span>
						<span class="enchant-shadow">Intellect</span>
						<div class="enchant color-q2"><a href="/wow/en/item/52753">Intellect</a>
					</div>
						<span class="level">397</span>
						<span class="sockets"><span class="icon-socket socket-2"><a href="/wow/en/item/52236" class="gem">
						<img src="http://eu.media.blizzard.com/wow/icons/18/inv_misc_cutgemsuperior3.jpg" alt="" />
						<span class="frame"></span></a></span></span>
					</div></div></div></div>';
		}
	}
	
	public function run()
	{
		$result = $this->_parseEquipmentCache($this->getObjectInfo()->equipmentCache);
		$this->_viewItems($result);
	}
}

?>