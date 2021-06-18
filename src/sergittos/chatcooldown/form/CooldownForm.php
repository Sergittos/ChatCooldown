<?php

declare(strict_types=1);


namespace sergittos\chatcooldown\form;


use EasyUI\element\Button;
use EasyUI\variant\SimpleForm;
use pocketmine\form\Form;
use pocketmine\Player;

class CooldownForm extends SimpleForm {

    public function __construct() {
        parent::__construct("Cooldown");
    }

    protected function onCreation(): void {
        $this->addRedirectFormButton("Set Cooldown", new SetCooldownForm());
        $this->addRedirectFormButton("Remove Cooldown", new RemoveCooldownForm());
    }

    private function addRedirectFormButton(string $name, Form $form): void {
        $button = new Button($name);
        $button->setSubmitListener(function(Player $player) use ($form) {
            $player->sendForm($form);
        });
        $this->addButton($button);
    }
}