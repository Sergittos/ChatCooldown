<?php

declare(strict_types=1);


namespace sergittos\chatcooldown\listener;


use pocketmine\event\Listener;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerQuitEvent;
use sergittos\chatcooldown\session\SessionFactory;

class SessionListener implements Listener {

    public function onLogin(PlayerLoginEvent $event): void {
        SessionFactory::createSession($event->getPlayer());
    }

    public function onQuit(PlayerQuitEvent $event): void {
        SessionFactory::removeSession($event->getPlayer());
    }

}