<?php

namespace GuiShop\Modals\network;

#include <rules/DataPacket.h>

use pocketmine\network\mcpe\handler\SessionHandler;
use pocketmine\network\mcpe\NetworkSession;
use pocketmine\network\mcpe\protocol\DataPacket;

class ModalFormRequestPacket extends DataPacket{
    public const NETWORK_ID = ProtocolInfo::MODAL_FORM_REQUEST_PACKET;

    /** @var int */
    public $formId;
    /** @var string */
    public $formData; //json

    protected function decodePayload() : void{
        $this->formId = $this->getUnsignedVarInt();
        $this->formData = $this->getString();
    }

    protected function encodePayload() : void{
        $this->putUnsignedVarInt($this->formId);
        $this->putString($this->formData);
    }

    public function handle(SessionHandler $handler) : bool{
        return $handler->handleModalFormRequest($this);
    }
}
