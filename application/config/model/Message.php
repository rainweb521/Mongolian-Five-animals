<?php
/**
 * Created by PhpStorm.
 * Message: Rain
 * Date: 2017/10/24
 * Time: 18:01
 */
namespace app\config\model;

use phpDocumentor\Reflection\Types\Null_;
use think\Model;

class Message extends Model{
    /**
     * 主键默认自动识别
     */
//    protected $pk = 'uid';
// 设置当前模型对应的完整数据表名称
    protected $table = 'message';
    public function get_MessageInfo($where=null){
        $data = Message::where($where)->find();
        if ($data!=null){
            return $data->getData();
        }else{
            return $data;
        }
    }
    public function insert_MessageInfo($data){
        Message::save($data);
    }

    public function get_MessageList($where=null){
        $list = Message::where($where)->select();
        return $list;
    }

}