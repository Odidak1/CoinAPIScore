<?php
declare(strict_types = 1);

namespace Ifera\CoinAPIScore\listeners;

use Ifera\CoinAPIScore\Main;
use Ifera\ScoreHud\event\TagsResolveEvent;
use onebone\coinapi\CoinAPI;
use pocketmine\event\Listener;
use function count;
use function explode;

class TagResolveListener implements Listener{

	/** @var Main */
	private $plugin;

	public function __construct(Main $plugin){
		$this->plugin = $plugin;
	}

	public function onTagResolve(TagsResolveEvent $event){
		$tag = $event->getTag();
		$tags = explode('.', $tag->getName(), 2);
		$value = "";

		if($tags[0] !== 'saungmcscore' || count($tags) < 2){
			return;
		}

		switch($tags[1]){
			case "coin":
				$value = CoinAPI::getInstance()->myCoin($event->getPlayer());
				break;
		}

		$tag->setValue((string) $value);
	}
}
