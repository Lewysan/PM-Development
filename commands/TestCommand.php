<?php

namespace me\laNety\commands;

use me\laNety\listeners\PlayerListener;
use pocketmine\color\Color;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginOwned;
use pocketmine\plugin\PluginOwnedTrait;
use pocketmine\utils\TextFormat;

class TestCommand extends Command implements PluginOwned {
    use PluginOwnedTrait {
        __construct as __trail;
    }

    public function __construct(Plugin $p){
        parent::__construct("pin", "", null, []);
        $this->__trail($p);
    }

    public function execute(CommandSender $sender, string $label, array $args){
        if (!($sender instanceof Player)){
            $this->noConsolePermission($sender);
        }
        if (count($args) < 1 || empty($staff)){
            $this->usageCommand($sender);
        } 
        if ($args[0] != "contrasenia"){
             $this->wrongPassword($sender);
        } else {
            $this->successfulyAuth($sender);
        }
    }
    public function noConsolePermission(CommandSender $sender){
        $sender->sendMessage(TextFormat::RED."No tienes permiso para ejeuctar este comando .v");
    }
    public function usageCommand(CommandSender $sender){
        $sender->sendMessage(TextFormat::RED."Uso: /pin <PIN>");
    }
    public function wrongPassword(CommandSender $sender){
        $sender->sendMessage(TextFormat::RED."PIN incorrecto.");
    }
    public function successfulyAuth(CommandSender $sender){
        unset(PlayerListener::$staff[$sender->getName()]);
        $sender->sendMessage(TextFormat::GREEN."PIN correcto.");
    }
}
