<?php

declare(strict_types=1);


namespace sergittos\chatcooldown\session;


use pocketmine\player\Player;
use sergittos\chatcooldown\utils\ColorUtils;
use sergittos\chatcooldown\utils\CooldownUtils;

class Session {

    private Player $player;
    private int $last_chat_time = 0;

    public function __construct(Player $player) {
        $this->player = $player;
    }

    public function getPlayer(): Player {
        return $this->player;
    }

    public function canChat(): bool {
        if($this->player->hasPermission("chatcooldown.bypass")) {
            return true;
        }
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
        $this->player->sendMessage(ColorUtils::translate($text));
    }

}