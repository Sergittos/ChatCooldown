<?php

declare(strict_types=1);


namespace sergittos\chatcooldown;


use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;
use sergittos\chatcooldown\listener\CooldownListener;
use sergittos\chatcooldown\listener\SessionListener;
use sergittos\chatcooldown\utils\CooldownUtils;

class ChatCooldown extends PluginBase {
    use SingletonTrait;

    protected function onLoad(): void {
        self::setInstance($this);
        $this->saveDefaultConfig();
    }

    protected function onEnable(): void {
        CooldownUtils::init();

        $this->registerEvents(new CooldownListener());
        $this->registerEvents(new SessionListener());

        $this->getServer()->getCommandMap()->register("chatcooldown", new CooldownCommand());
    }

    protected function onDisable(): void {
        CooldownUtils::save();
    }

    private function registerEvents(Listener $listener): void {
        $this->getServer()->getPluginManager()->registerEvents($listener, $this);
    }

}