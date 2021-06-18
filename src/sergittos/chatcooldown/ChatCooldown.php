<?php

declare(strict_types=1);


namespace sergittos\chatcooldown;


use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;
use sergittos\chatcooldown\command\CooldownCommand;
use sergittos\chatcooldown\listener\CooldownListener;
use sergittos\chatcooldown\session\SessionListener;

class ChatCooldown extends PluginBase {
    use SingletonTrait;

    public function onLoad() {
        $this->saveResource("cooldowns");
        self::setInstance($this);
    }

    public function onEnable(): void {
        $this->registerCommand(new CooldownCommand());

        $this->registerEvent(new CooldownListener());
        $this->registerEvent(new SessionListener());
    }

    private function registerCommand(Command $command): void {
        $this->getServer()->getCommandMap()->register("chatcooldown", $command);
    }

    private function registerEvent(Listener $listener): void {
        $this->getServer()->getPluginManager()->registerEvents($listener, $this);
    }
}