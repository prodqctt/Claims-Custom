<?php

namespace buq;

use buq\event\Handler;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {
  
  public static Main $instance;
  
  protected function onLoad() : void {
    self::$instance = $this;
  }
  
  protected function onEnable() : void {
    $this->getServer()->getPluginManager()->registerEvents(new Handler(), $this);
  }
  
  public static function getInstance() : self {
    return self::$instance;
  }
}

?>