<?php

declare(strict_types=1);


namespace sergittos\chatcooldown;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class CooldownCommand extends Command {

    public function __construct() {
        $this->setPermission("chatcooldown.admin");
        parent::__construct("cooldown", "Update the chat cooldown");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void {
        $sender->setScreenLineHeight(null);
        if($this->testPermission($sender) and $sender instanceof Player) {
            $sender->sendForm(new CooldownForm());
        }
    }

}