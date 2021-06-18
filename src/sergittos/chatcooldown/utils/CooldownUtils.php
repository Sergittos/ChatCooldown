<?php

declare(strict_types=1);


namespace sergittos\chatcooldown\utils;


class CooldownUtils {

    /** @var int */
    static $cooldown = -1;

    /** @var int */
    static $last_chat_time = 0;

    public static function setCooldown($time): void {
        self::$cooldown = $time;
    }

    public static function hasCooldown(): bool {
        return self::$cooldown !== -1;
    }

    public static function canChat(): bool {
        if(time() - self::$last_chat_time > self::$cooldown) {
            self::$last_chat_time = time();
            return true;
        }
        return false;
    }
}