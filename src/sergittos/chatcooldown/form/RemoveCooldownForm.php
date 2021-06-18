<?php

declare(strict_types=1);


namespace sergittos\chatcooldown\form;


use EasyUI\variant\ModalForm;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use sergittos\chatcooldown\utils\CooldownUtils;

class RemoveCooldownForm extends ModalForm {

    public function __construct() {
        parent::__construct("Remove Cooldown", "Are you sure that you want to remove the cooldown?");
    }

    protected function onAccept(Player $player): void {
        if(!CooldownUtils::hasCooldown()) {
            $player->sendMessage(TextFormat::RED . "You cannot remove the cooldown because there is not any cooldown!");
        } else {
            CooldownUtils::setCooldown(-1);
            $player->sendMessage(TextFormat::GREEN . "You have removed the cooldown correctly");
        }
    }

    protected function onDeny(Player $player): void {
        $player->sendForm(new CooldownForm());
    }
}