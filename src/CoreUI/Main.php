<?php
/*
Mr.Galaxy
*/
namespace CoreUI;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;

class Main extends PluginBase implements Listener {
	
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);    
        $this->getLogger()->info(TextFormat::GREEN . "CoreUI by Mr.galaxy Enable");
    }
    public function onDisable() {
        $this->getLogger()->info(TextFormat::RED . "CoreUI by Mr.galaxy Disable");
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
        switch($cmd->getName()){                    
            case "coreui":
                if ($sender->hasPermission("coreui.command")){
                     $this->Menu($sender);
                }else{     
                     $sender->sendMessage(TextFormat::RED . "shoma ejaze in karo nadarid!");
                     return true;
                }     
            break;         
            
         }  
        return true;                         
    }
   
    public function Menu($sender){ 
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, int $data = null) { 
            $result = $data;
            if($result === null){
                return true;
            }             
            switch($result){
                case 0:
            $sender->sendMessage(TextFormat::LIGHT_PURPLE."anjam shod ", TextFormat::YELLOW . "mitonid parvaz konid!", 20, 20, 20);
            $sender->setAllowFlight(true);
                break;
                case 1:
            $sender->sendMessage(TextFormat::LIGHT_PURPLE."anjam shod ", TextFormat::YELLOW . "nemitonid parvaz konid!", 20, 20, 20);
            $sender->setAllowFlight(false);
                break;				
                case 2:
            $sender->setHealth(20);
            $sender->sendMessage(TextFormat::LIGHT_PURPLE."anjam shod) ", TextFormat::YELLOW . "joone shoma por shod", 20, 20, 20);
                break;  
                case 3:
            $sender->setFood(20);
            $sender->sendMessage(TextFormat::LIGHT_PURPLE."anjam shod ", TextFormat::YELLOW . "ghaza ye shoma por shod!!", 20, 20, 20);
                break;  
                case 4:
            $sender->setGameMode(1);
            $sender->sendMessage(TextFormat::LIGHT_PURPLE."anjam shod ", TextFormat::YELLOW . "shoma be halate khalagh tabdil shodid", 20, 20, 20);
                break;
                case 5:
            $sender->setGameMode(2);
            $sender->sendMessage(TextFormat::LIGHT_PURPLE."anjam shod ", TextFormat::YELLOW . "shoma majara go shodid(block nemitonid bekanid)", 20, 20, 20);
                break;
                case 6:
            $sender->setGameMode(3);
            $sender->sendMessage(TextFormat::LIGHT_PURPLE."anjam shod ", TextFormat::YELLOW . "shoma bazdid konande shodid", 20, 20, 20);
                break;			
		case 7:
            $sender->addEffect(new EffectInstance(Effect::getEffect(Effect::INVISIBILITY), 99999999, 0, false));
            $sender->addTitle(TextFormat::LIGHT_PURPLE."anjam shod ", TextFormat::YELLOW . "na marii faal shod", 20, 20, 20);
                break;		    
		case 8:
            $sender->removeEffect(Effect::INVISIBILITY);
            $sender->addTitle(TextFormat::LIGHT_PURPLE."anjam shod ", TextFormat::YELLOW . "na marii gheir faal shod", 20, 20, 20);
		break;	    
		case 9:
            $command = "list" ;
            $this->getServer()->getCommandMap()->dispatch($sender, $command);
		break;	     
                case 10:
            $sender->sendMessage(TextFormat::LIGHT_PURPLE."anjam shod ", TextFormat::YELLOW . "Menu Bste shod", 20, 20, 20);
                break;				
            }
            
            
            });
            $form->setTitle(TextFormat::BOLD. TextFormat::GREEN."CORE");
			$form->setContent(TextFormat::GRAY."plugine menu core\n".TextFormat::GRAY,"Version: 1");
                        $form->addButton(TextFormat::GRAY."parvaz kardan\n".TextFormat::GREEN."bezanid parvaz konid");
			$form->addButton(TextFormat::GRAY."parvaz nakardan\n".TextFormat::GREEN."bezanid parvaz gheir faal she");
			$form->addButton(TextFormat::GRAY."joon\n".TextFormat::GREEN."bezanid ta jooneton por she");
			$form->addButton(TextFormat::GRAY."ghaza\n".TextFormat::GREEN."bezanid ta ghazaton kamel beshe");
			$form->addButton(TextFormat::GRAY."gamemode khalagh\n".TextFormat::GREEN."taghir be halte khalaghiat");
			$form->addButton(TextFormat::GRAY."gamemode majarajoii\n".TextFormat::GREEN."bezanid ta be halate majara jo tabdil beshid(kandane block kar nemikonad)");
			$form->addButton(TextFormat::GRAY."bazdid konande\n".TextFormat::GREEN."bezanid ta be halate bazdid konande beravid");
	     		$form->addButton(TextFormat::GRAY."namari shodan\n".TextFormat::GREEN."bezabid ta namari faal shavad");
	    		$form->addButton(TextFormat::GRAY."gheir faal kardane namari\n".TextFormat::GREEN."bezabid ta namari gheire faal shavad");
	    		$form->addButton(TextFormat::GRAY."Player ha\n".TextFormat::GREEN."neshon dadane player ha");
			
            $form->addButton(TextFormat::RED."bastan");
            $form->sendToPlayer($sender);
            return $form;                                            
    }
 
                                                                                                                                                                                                                                                                                          
}
