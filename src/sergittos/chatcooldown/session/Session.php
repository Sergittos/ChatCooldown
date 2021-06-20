<?php

declare(strict_types=1);


namespace sergittos\chatcooldown\session;


use pocketmine\Player;
use sergittos\chatcooldown\CooldownUtils;

class Session {

    /** @var Player */
    private $player;

    /** @var int */
    private $last_chat_time = 0;

    public function __construct(Player $player) {
        $this->player = $player;
    }

    public function getPlayer(): Player {
        return $this->player;
    }

    public function canChat(): bool {
        if($this->getTimeElapsed() >= CooldownUtils::getCooldown()) {
            $this->last_chat_time = time();
            return true;
        }
        return false;
    }

    public function getTimeRemaining(): int {
        return CooldownUtils::getCooldown() - $this->getTimeElapsed();
    }

    private function getTimeElapsed(): int {
        return time() - $this->last_chat_time;
    }

    public function message(string $text): void {
        $this->player->sendMessage($text);
    }

}