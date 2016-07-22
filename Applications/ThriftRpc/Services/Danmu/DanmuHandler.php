<?php
namespace Services\Danmu;

use \GatewayWorker\Lib\Gateway;
use \MongoQB\Db;
use \Applications\Settings;

class DanmuHandler implements DanmuIf {
    public function getRoomNumByRoomId($roomid)
    {
        return Gateway::getClientCountByGroup($roomid);
    }

    public function getDanmuNumByRoomId($roomid)
    {
        $num = 0;
        if(Settings::USE_MONGO){
            $db = Db::instance('danmu');
            $num = $db->count('room'.$roomid);
        }
        return $num;
    }

    public function sendGfitDanmuToRoom($roomid, $content, $img)
    {
        // 广播弹幕格式 {type:'gift', content:'danmudata', img:'imgpath'}
        $new_message = array(
            'type' => 'gift',
            'content' => $content,
            'img' => $img
        );
        Gateway::sendToGroup($roomid, json_encode($new_message));
    }
}
