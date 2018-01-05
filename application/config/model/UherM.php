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

class UherM extends Model{
    /**
     * 主键默认自动识别
     */
//    protected $pk = 'uid';
// 设置当前模型对应的完整数据表名称
    protected $table = 'yimaga';
    public function get_uherInfo($where=null){
        $data = UherM::where($where)->find();
        if ($data!=null){
            return $data->getData();
        }else{
            return $data;
        }
    }
    public function insert_uherInfo($data){
        UherM::save($data);
//        $u_id = $this->get_tegemeInfo($data);
//        return $u_id['u_id'];
    }
    public function save_uherInfo($data,$where){
        UherM::save($data,$where);
    }
    public function get_uherList($where=null){
        $list = UherM::where($where)->select();
        return $list;
    }
    public function delete_uherInfo($where){
        UherM::where($where)->delete();
    }


}