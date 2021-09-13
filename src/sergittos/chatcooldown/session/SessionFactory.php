<?php

declare(strict_types=1);


namespace sergittos\chatcooldown\session;



use pocketmine\player\Player;

class SessionFactory {

    /** @var Session[] */
    static private array $sessions = [];

    static public function getSession(Player $player): ?Session {
        return self::$sessions[$player->getName()] ?? null;
    }

    static public function createSession(Player $player): void {
        self::$sessions[$player->getName()] = new Session($player);
    }

    static public function removeSession(Player $player): void {
        unset(self::$sessions[$player->getName()]);
    }

}