<?php

namespace buq\event;

use buq\class\Arena;

use pocketmine\event\Event;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;

use pocketmine\player\Player;
use pocketmine\Server;

class Handler implements Listener{
  
  public function onMove(PlayerMoveEvent $event) : void {
    var_dump(Arena::isInside($event->getPlayer()));
  }
  
  public static function getServer() {
    return Server::getInstance();
  }
}
?>