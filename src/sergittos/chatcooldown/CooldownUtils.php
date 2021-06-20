<?php

declare(strict_types=1);


namespace sergittos\chatcooldown;


use pocketmine\utils\Config;

class CooldownUtils {

    /** @var int */
    static private $cooldown;

    /** @var Config */
    static private $config;

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