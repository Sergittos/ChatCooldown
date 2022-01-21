<?php

declare(strict_types=1);


namespace sergittos\chatcooldown\utils;


use pocketmine\utils\Config;
use sergittos\chatcooldown\ChatCooldown;

class CooldownUtils {

    static private Config $config;
    static private int $cooldown;

    static public function init(): void {
        /** @var ChatCooldown $plugin */
        $plugin = ChatCooldown::getInstance();

        $config = $plugin->getConfig();

        self::$config = $config;
        self::$cooldown = $config->get("cooldown");
    }

    static public function save(): void {
        self::$config->set("cooldown", self::$cooldown);
        self::$config->save();
    }

    static public function getCooldown(): int {
        return self::$cooldown;
    }

    static public function setCooldown(int $cooldown): void {
        self::$cooldown = $cooldown;
    }

}