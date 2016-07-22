namespace php Services.Danmu
namespace java com.danmu.service
service Danmu
{
    i64 getRoomNumByRoomId(1:i32 roomid);
	i64 getDanmuNumByRoomId(1:i32 roomid);

    void sendGfitDanmuToRoom(1:i32 roomid, 2:string content, 3:string img);
}