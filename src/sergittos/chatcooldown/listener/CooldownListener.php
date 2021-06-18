<?php

declare(strict_types=1);


namespace sergittos\chatcooldown\listener;


use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\utils\TextFormat;
use sergittos\chatcooldown\session\SessionFactory;

class CooldownListener implements Listener {

    public function onChat(PlayerChatEvent $event): void {
        $player = $event->getPlayer();
        $session = SessionFactory::getSession($player);
        if(!$session->canChat()) {
            $event->setCancelled(true);
            $player->sendMessage(TextFormat::RED . $session->getCooldown() . " seconds have not passed yet!");
        }
    }
}