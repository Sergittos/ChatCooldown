<?php

declare(strict_types=1);


namespace sergittos\chatcooldown;


use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use sergittos\chatcooldown\command\CooldownCommand;
use sergittos\chatcooldown\listener\CooldownListener;

class ChatCooldown extends PluginBase {

    public function onEnable(): void {
        $this->registerCommand(new CooldownCommand());
        $this->registerEvent(new CooldownListener());
    }

    private function registerCommand(Command $command): void {
        $this->getServer()->getCommandMap()->register("chatcooldown", $command);
    }

    private function registerEvent(Listener $listener): void {
        $this->getServer()->getPluginManager()->registerEvents($listener, $this);
    }
}