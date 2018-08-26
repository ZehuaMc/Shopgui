<?php

namespace GuiShop\Modals\network;

#include <rules/DataPacket.h>

use pocketmine\network\mcpe\handler\SessionHandler;
use pocketmine\network\mcpe\NetworkSession;
use pocketmine\network\mcpe\protocol\DataPacket;

class GuiDataPickItemPacket extends DataPacket{
	public const NETWORK_ID = ProtocolInfo::GUI_DATA_PICK_ITEM_PACKET;

	/** @var string */
	public $itemDescription;
	/** @var string */
	public $itemEffects;
	/** @var int */
	public $hotbarSlot;

	protected function decodePayload() : void{
		$this->itemDescription = $this->getString();
		$this->itemEffects = $this->getString();
		$this->hotbarSlot = $this->getLInt();
	}

	protected function encodePayload() : void{
		$this->putString($this->itemDescription);
		$this->putString($this->itemEffects);
		$this->putLInt($this->hotbarSlot);
	}

	public function handle(SessionHandler $handler) : bool{
		return $handler->handleGuiDataPickItem($this);
	}
}
