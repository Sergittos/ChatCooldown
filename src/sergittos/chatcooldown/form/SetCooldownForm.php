<?php

declare(strict_types=1);


namespace sergittos\chatcooldown\form;


use EasyUI\element\Input;
use EasyUI\utils\FormResponse;
use EasyUI\variant\CustomForm;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use sergittos\chatcooldown\utils\CooldownUtils;

class SetCooldownForm extends CustomForm {

    public function __construct() {
        parent::__construct("Set Cooldown");
    }

    protected function onCreation(): void {
        $this->addTimeInput();
    }

    protected function onSubmit(Player $player, FormResponse $response): void {
        $time = $response->getInputSubmittedText("time");

        CooldownUtils::setCooldown($time);
        $player->sendMessage(TextFormat::GREEN . "You have set the cooldown to $time seconds!");
    }

    private function addTimeInput(): void {
        $input = new Input("Time: (In seconds)");
        $this->addElement("time", $input);
    }
}