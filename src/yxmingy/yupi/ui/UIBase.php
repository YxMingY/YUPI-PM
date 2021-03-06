<?php
namespace yxmingy\yupi\ui;

use pocketmine\Player;
use yxmingy\yupi\
{HandlerBase,HandlerManager,UISender,Utils};

abstract class UIBase {
  /*[
      "type"=>{form/modal/...}
      "title"=>(string)
      "content"=>(string/element)
    ]
  */
  protected $data = [];
  
  public function __construct(string $type,string $title)
  {
    $this->data["type"] = $type;
    $this->data["title"] = $title;
  }
  
  public function send(Player $player):void
  {
    UISender::sendUI(
      Utils::buildId($this->data["title"]),
      $this->data,
      $player
    );
  }
  
  public function setHandler(callable $handler):UIBase
  {
    $id = Utils::buildId($this->data["title"]);
    HandlerManager::addHandler($id,$handler);
    return $this;
  }
}