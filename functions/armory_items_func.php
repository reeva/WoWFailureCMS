<?php 
$connection_setup = mysql_connect($serveraddress,$serveruser,$serverpass)or die(mysql_error());
mysql_select_db($server_cdb,$connection_setup)or die(mysql_error());
$username = mysql_real_escape_string($name = $_GET['name']);
$lbrspa = mysql_query("SELECT guid,name,race,class,gender,level,health,power1 FROM characters WHERE name = '".$username."'");
$get = mysql_fetch_assoc($lbrspa);
$itrspa = mysql_query("SELECT itemEntry, slot,enchantments FROM item_instance inner join character_inventory on item_instance.guid=character_inventory.item where owner_guid=".$get['guid']);
//Character Class
$cclass = $get['class'];
if ($cclass == 1)
{
$class2 = "Warrior";
}
elseif ($cclass == 2)
{
$class2 = "Paladin";
}
elseif ($cclass == 3)
{
$class2 = "Hunter";
}
elseif ($cclass == 4)
{
$class2 = "Rogue";
}
elseif ($cclass == 5)
{
$class2 = "Priest";
}
elseif ($cclass == 6)
{
$class2 = "Death Knight";
}
elseif ($cclass == 7)
{
$class2 = "Shaman";
}
elseif ($cclass == 8)
{
$class2 = "Mage";
}
elseif ($cclass == 9)
{
$class2 = "Warlock";
}
elseif ($cclass == 11)
{
$class2 = "Druid";
}
//Character Race
$rrace = $get['race'];
$gender = $get['gender'];
if ($rrace == 1)
{
$race = "Human";
}
elseif ($rrace == 2)
{
$race = "Orc";
}
if ($rrace == 3)
{
$race = "Dwarf";
}
elseif ($rrace == 4)
{
$race = "Night Elf";
}
elseif ($rrace == 5)
{
$race = "Undead";
}
elseif ($rrace == 6)
{
$race = "Tauren";
}
elseif ($rrace == 7)
{
$race = "Gnome";
}
elseif ($rrace == 8)
{
$race = "Troll";
}
elseif ($rrace == 9)
{
$race = "Goblin";
}
elseif ($rrace == 10)
{
$race = "Blood Elf";
}
elseif ($rrace == 11)
{
$race = "Draenei";
}
elseif ($rrace == 22)
{
$race = "Worgen";
}
//Character Gender
$ggender = $get['gender'];
if($ggender == 1)
{
$gender = "Female";
}
else
if($ggender == 0)
{
$gender = "Male";
}
// Alliance or Horde FLAG
if($rrace == 1 || $rrace == 3 || $rrace == 4 || $rrace == 7 || $rrace == 11 || $rrace == 22)
{
$bg = "alliance";
}
elseif($rrace == 2 || $rrace == 5 || $rrace == 6 || $rrace == 8 || $rrace == 9 || $rrace == 10)
{
$bg = "horde";
}
// Powers
if($cclass == 2 || $cclass == 7 || $cclass == 8 || $cclass == 9 || $cclass == 11 || $cclass == 5)
{
$power = "0";
}
elseif($cclass == 3)
{
$power = "2";
}
elseif($cclass == 1)
{
$power = "1";
}
elseif($cclass == 4)
{
$power = "3";
}
elseif($cclass == 6)
{
$power = "6";
}
// Powers NAME
if($cclass == 2 || $cclass == 7 || $cclass == 8 || $cclass == 9 || $cclass == 11 || $cclass == 5)
{
$powname = "Mana";
}
elseif($cclass == 3)
{
$powname = "Focus";
}
elseif($cclass == 1)
{
$powname = "Rage";
}
elseif($cclass == 4)
{
$powname = "Energy";
}
elseif($cclass == 6)
{
$powname = "Runic";
}
?>