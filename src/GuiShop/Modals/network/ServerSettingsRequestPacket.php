<?php

namespace GuiShop\Modals\network;

#include <rules/DataPacket.h>

use pocketmine\network\mcpe\handler\SessionHandler;
use pocketmine\network\mcpe\NetworkSession;
use pocketmine\network\mcpe\protocol\DataPacket;

class ServerSettingsRequestPacket extends DataPacket{
    public const NETWORK_ID = ProtocolInfo::SERVER_SETTINGS_REQUEST_PACKET;

    protected function decodePayload() : void{
        //No payload
    }

    protected function encodePayload() : void{
        //No payload
    }

    public function handle(SessionHandler $handler) : bool{
        return true;
    }
}