<?php

declare(strict_types=1);


namespace sergittos\chatcooldown;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginOwned;

class CooldownCommand extends Command implements PluginOwned {

    public function __construct() {
        $this->setPermission("chatcooldown.admin");
        parent::__construct("cooldown", "Update the chat cooldown");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void {
        if($sender instanceof Player) {
            $sender->sendForm(new CooldownForm());
        }
    }

    public function getOwningPlugin(): Plugin {
        return ChatCooldown::getInstance();
    }

}