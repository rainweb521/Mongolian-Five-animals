<?php
/**
 * Created by PhpStorm.
 * User: Rain
 * Date: 2017/10/24
 * Time: 18:01
 */
namespace app\config\model;

use phpDocumentor\Reflection\Types\Null_;
use think\Model;

class MoriM extends Model{
    /**
     * 主键默认自动识别
     */
//    protected $pk = 'uid';
// 设置当前模型对应的完整数据表名称
    protected $table = 'mori';
    public function get_moriInfo($where=null){
        $data = MoriM::where($where)->find();
        if ($data!=null){
            return $data->getData();
        }else{
            return $data;
        }
    }
    public function insert_moriInfo($data){
        MoriM::save($data);
//        $u_id = $this->get_tegemeInfo($data);
//        return $u_id['u_id'];
    }
    public function save_moriInfo($data,$where){
        MoriM::save($data,$where);
    }
    public function get_moriList($where=null){
        $list = MoriM::where($where)->select();
        return $list;
    }
    public function delete_moriInfo($where){
        MoriM::where($where)->delete();
    }


}