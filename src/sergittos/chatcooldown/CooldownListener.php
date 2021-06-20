<?php

declare(strict_types=1);


namespace sergittos\chatcooldown;


use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\utils\TextFormat;
use sergittos\chatcooldown\session\SessionFactory;

class CooldownListener implements Listener {

    public function onChat(PlayerChatEvent $event): void {
        $session = SessionFactory::getSession($event->getPlayer());
        if(!$session->canChat()) {
            $session->message(TextFormat::RED . $session->getTimeRemaining() . " seconds have not passed yet!");
            $event->setCancelled(true);
        }
    }
}