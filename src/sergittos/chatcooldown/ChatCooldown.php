<?php

declare(strict_types=1);


namespace sergittos\chatcooldown;


use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;
use sergittos\chatcooldown\session\SessionListener;

class ChatCooldown extends PluginBase {
    use SingletonTrait;

    public function onLoad() {
        self::setInstance($this);
        $this->saveDefaultConfig();
    }

    public function onEnable(): void {
        CooldownUtils::init();

        $this->registerEvents(new CooldownListener());
        $this->registerEvents(new SessionListener());

        $this->getServer()->getCommandMap()->register("chatcooldown", new CooldownCommand());
    }

    public function onDisable() {
        CooldownUtils::save();
    }

    private function registerEvents(Listener $listener): void {
        $this->getServer()->getPluginManager()->registerEvents($listener, $this);
    }

}