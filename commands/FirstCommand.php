<?php

namespace me\laNety\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginOwned;
use pocketmine\plugin\PluginOwnedTrait;

class FirstCommand extends Command implements PluginOwned {
    use PluginOwnedTrait {
        __construct as __trail;
    }

    public function __construct(Plugin $p){
        parent::__construct("test", "", null, []);
        $this->__trail($p);
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
    
            if (!$sender->hasPermission("permiso.permiso")){
                $sender->sendMessage("No tienes permiso pa esta wea");         
            } else {
                if (count($args) == 0){
                    $sender->sendMessage("Debes especificar un numerito .v");
                }else{
                    switch($args[0]){
                        case 0: { // pongo zero xk es solo 1 jsjsjs
                            $sender->sendMessage("mensajiot de prueba 1 jsjsjs");
                            break;
                        }
                        case 1: {
                            $sender->sendMessage("mensajiot de prueba 2 jsjsjs");
                            break;
                        }
                        case 2: {
                            $sender->sendMessage("mensajiot de prueba 2 jsjsjs");
                            break;
                        }
                       case 3: {
                            $sender->sendMessage("mensajiot de prueba 2 jsjsjs");
                            break;
                        }
                      case 4: {
                            for ($i = 1; $i < 300; $i++) {
                              $sender->sendMessage("Mensajito: "+$i);
                            break;
                        }
                        default: {
                            break;
                        }
                    }
                }
                if (count($args) >= 1){
                    $sender->sendMessage("Uso: /test 0-1-2-3");
            
            }
        }
    }
}
