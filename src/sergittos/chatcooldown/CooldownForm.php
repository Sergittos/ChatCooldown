<?php

declare(strict_types=1);


namespace sergittos\chatcooldown;


use EasyUI\element\Input;
use EasyUI\utils\FormResponse;
use EasyUI\variant\CustomForm;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;
use sergittos\chatcooldown\utils\CooldownUtils;

class CooldownForm extends CustomForm {

    public function __construct() {
        parent::__construct("Update the cooldown");
    }

    protected function onCreation(): void {
        $this->addElement("time", new Input("Time in seconds: (set to 0 to disable)", null, "Current cooldown: " . CooldownUtils::getCooldown()));
    }

    protected function onSubmit(Player $player, FormResponse $response): void {
        $time = $response->getInputSubmittedText("time");
        if(!is_numeric($time) or $time < 0) {
            $player->sendMessage(TextFormat::RED . "You must type a valid number!");
            return;
        }

        CooldownUtils::setCooldown((int) $time);
        $player->sendMessage(TextFormat::GREEN . "You have set the cooldown to $time seconds!");
    }

}