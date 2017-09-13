<?php

namespace MoneyAPI;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase{
  
  public function onEnable(){
    if($this->configExists()){
      $this->saveConfig();
    } else {
      $this->createConfig();
    }
  }
  
  public function createConfig(){
    if(!file_exists($this->getDataFolder() . "prefs.yml")){
      $this->config = new Config($this->getDataFolder() . "prefs.yml", Config::YAML, [
        "Max-Money" => 100000000
        ]);
    }
  }
  
  public function saveConfig(){
    if(file_exists($this->getDataFolder() . "prefs.yml")){
      $this->config->save();
    }
  }
  
  public function configExists(){
    if(file_exists($this->getDataFolder() . "prefs.yml")){
      return true;
    }
  }
  
  public function getMoneyManager(string $username){
    return new MoneyManager($this, $username);
  }
}
