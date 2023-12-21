<?php

namespace buq\class;

use buq\Main;

use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\player\Player;

class Arena {
  
  public static function create(String $name = '', int $posX1 = 0, int $posZ1 = 0, int $posX2 = 0, int $posZ2 = 0) : void {
    if (file_exists(Main::getInstance()->getDataFolder().$name)) {
      return;
    }
    $c = new Config(Main::getInstance()->getDataFolder().$name, Config::YAML);
    $c->setAll([
      "name" => $name,
      "x1" => $posX1,
      "z1" => $posZ1,
      "x2" => $posX2,
      "z2" => $posZ2,
      "format.enter" => "&eEntering &7:&a {$name}",
      "format.left" => "&eLeaving &7: &a{$name}"
      ]);
    $c->save();
  }
  
  public static function isInside(Player $player) : string {
    $pos = $player->getPosition();
    foreach (glob(Main::getInstance()->getDataFolder()."*.yml") as $file) {
      $base = yaml_parse(Config::fixYAMLIndexes(file_get_contents($file)));
      $minX = $base["x1"];
      $maxX = $base["x2"];
      
      $minZ = $base["z1"];
      $maxZ = $base["z2"];
      
      if ($pos->getFloorX() >= $minX and $pos->getFloorX() <= $maxX and $pos->getFloorZ() >= $minZ and $pos->getFloorZ() <= $maxZ) {
        return $data["name"];
      }
      return "Wilderness";
    }
  }
}

?>