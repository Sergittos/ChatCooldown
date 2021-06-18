<?php

declare(strict_types=1);


namespace sergittos\chatcooldown\command;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use sergittos\chatcooldown\form\CooldownForm;

class CooldownCommand extends Command {

    public function __construct() {
        parent::__construct("cooldown", "Manage the cooldowns");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        if($sender instanceof Player and $sender->hasPermission("cooldown.command")) {
            $sender->sendForm(new CooldownForm());
        }
    }
}