<?php

namespace MoneyAPI;

use pocketmine\Player;
use pocketmine\utils\Config;

class MoneyManager{
  
  public function __construct(Main $plugin, string $username){
    $this->plugin = $plugin;
    $this->username = $username;
  }
  
  public function getPlugin(){
    return $this->plugin;
  }
  
  public function getUsername(){
    return $this->username;
  }
  
  public function getPlayer(){
    $player = $this->getPlugin()->getServer()->getPlayer($this->getUsername());
    if($player !== null && $player->isOnline()){
      return $player;
    }
  }
  
  public function setMoney(int $money){
    if($money <= $this->getPlugin()->config->get("Max-Money")){
      $this->getPlugin()->money->set($this->getUsername(), $money);
    }
  }
  
  public function addMoney(int $money){
    if($this->getPlugin()->money->get($this->getUsername()) + $money <= $this->getPlugin()->config->get("Max-Money"){
      $money = $this->getPlugin()->money->get($this->getUsername()) + $money;
      $this->getPlugin()->money->set($this->getUsername(), $money);
    }
  }
}
