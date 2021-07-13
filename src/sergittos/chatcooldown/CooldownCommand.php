<?php

declare(strict_types=1);


namespace sergittos\chatcooldown;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class CooldownCommand extends Command implements PluginIdentifiableCommand {

    public function __construct() {
        $this->setPermission("chatcooldown.admin");
        parent::__construct("cooldown", "Update the chat cooldown");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void {
        if($this->testPermission($sender) and $sender instanceof Player) {
            $sender->sendForm(new CooldownForm());
        }
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function getPlugin(): Plugin {
        return ChatCooldown::getInstance();
    }

}