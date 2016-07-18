<?php
namespace Services\Danmu;

use \GatewayWorker\Lib\Gateway;

class DanmuHandler implements DanmuIf {
    public function getRoomNumByRoomId($roomid)
    {
        return Gateway::getClientCountByGroup($roomid);
    }
}
