<?php

declare(strict_types=1);


namespace sergittos\chatcooldown\session;


use pocketmine\Player;
use pocketmine\utils\Config;
use sergittos\chatcooldown\ChatCooldown;

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

    public function setCooldown($cooldown): void {
        $config = $this->getCooldownConfig();
        $config->set("cooldown", $cooldown);
        $config->save();
    }

    public function getLastChatTime(): int {
        return $this->last_chat_time;
    }

    public function getCooldown() {
        return $this->getCooldownConfig()->get("cooldown");
    }

    public function hasCooldown(): bool {
        return $this->getCooldown() !== 0;
    }

    public function canChat(): bool {
        if(time() - $this->last_chat_time > $this->getCooldownConfig()->get("cooldown")) {
            $this->last_chat_time = time();
            return true;
        }
        return false;
    }

    public function getCooldownConfig(): Config {
        return new Config(ChatCooldown::getInstance()->getDataFolder() . "cooldowns.yml", Config::YAML);
    }

    public function message(string $text): void {
        $this->player->sendMessage($text);
    }

}