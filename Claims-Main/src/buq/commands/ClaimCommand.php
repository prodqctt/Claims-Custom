<?php

namespace buq\commands;

use buq\class\Arena;
use buq\Main;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class ClaimCommand extends Command {

    public function __construct() {
        parent::__construct('claim', 'region command');
        parent::setPermission('test.cmd');
    }

    /**
     * execute
     */
    public function execute(CommandSender $sender, String $label, Array $args) : void {
        if ($sender instanceof Player) {
            if (!isset($args[0])) {
                return $sender->sendMessage("§e/claim <create:delete>");
            }

            switch ($args[0]) {
                case 'create':
                    if (!isset($args[1])) {
                        return;
                    }
                    Arena::create($args[1]);

                    break;
                case 'delete':
                    if (!isset($args[1])) {
                        return;
                    }
                    @unlink(Main::getInstance()->getDataFolder().$args[2]);
                    break;
            }
        }
    }
}
?>