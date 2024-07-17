<?php
declare(strict_types = 1);

namespace Ifera\CoinAPIScore;

use Ifera\CoinAPIScore\listeners\EventListener;
use Ifera\CoinAPIScore\listeners\TagResolveListener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

	protected function onEnable(): void{
	  $this->getLogger()->info(base64_decode("Q29pblNjb3JlIFNhdW5nTUMgcmVtYWtlIGJ5IE9kaWRhaw=="));
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
		$this->getServer()->getPluginManager()->registerEvents(new TagResolveListener($this), $this);
	}
}
