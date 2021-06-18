<?php

declare(strict_types=1);


namespace sergittos\chatcooldown\listener;


use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\utils\TextFormat;
use sergittos\chatcooldown\utils\CooldownUtils;

class CooldownListener implements Listener {

    public function onChat(PlayerChatEvent $event): void {
        if(!CooldownUtils::canChat()) {
            $event->setCancelled(true);
            $event->getPlayer()->sendMessage(TextFormat::RED . CooldownUtils::$cooldown . " seconds have not passed yet!");
        }
    }
}