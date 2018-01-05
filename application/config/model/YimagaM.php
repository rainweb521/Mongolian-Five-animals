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

class YimagaM extends Model{
    /**
     * 主键默认自动识别
     */
//    protected $pk = 'uid';
// 设置当前模型对应的完整数据表名称
    protected $table = 'yimaga';
    public function get_yimagaInfo($where=null){
        $data = YimagaM::where($where)->find();
        if ($data!=null){
            return $data->getData();
        }else{
            return $data;
        }
    }
    public function insert_yimagaInfo($data){
        YimagaM::save($data);
//        $u_id = $this->get_tegemeInfo($data);
//        return $u_id['u_id'];
    }
    public function save_yimagaInfo($data,$where){
        YimagaM::save($data,$where);
    }
    public function get_yimagaList($where=null){
        $list = YimagaM::where($where)->select();
        return $list;
    }
    public function delete_yimagaInfo($where){
        YimagaM::where($where)->delete();
    }


}