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

class Temege extends Model{
    /**
     * 主键默认自动识别
     */
//    protected $pk = 'uid';
// 设置当前模型对应的完整数据表名称
    protected $table = 'temege';
    public function get_temegeInfo($where=null){
        $data = temege::where($where)->find();
        if ($data!=null){
            return $data->getData();
        }else{
            return $data;
        }
    }
    public function insert_temegeInfo($data){
        temege::save($data);
        $u_id = $this->get_UserInfo($data);
        return $u_id['u_id'];
    }
    public function save_temegeInfo($data,$where){
        temege::save($data,$where);
    }
    public function get_temegeList($where=null){
        $list = temege::where($where)->select();
        return $list;
    }
    public function delete_UserInfo($id){
        $data = $this->get_filebedInfo(array('id'=>$id));
        $data['state'] = 3;
        $data['out_time'] = date('Y-m-d');
        temege::save($data,['id'=>$id]);
    }
    public function get_Blank(){
        $data['title'] = '';
        $data['profile'] = '';
        $data['content'] = '';
        $data['add_time'] = '';
        $data['focus'] = '';
        $data['material'] = '';
        $data['state'] = 1;
        $data['status_grade'] = Request::instance()->port('status_grade',1);
        $data['status_react'] = Request::instance()->port('status_grade',1);
        $data['uploader'] = Request::instance()->port('uploader','');
    }
    /**
     * 给文件添加有效期，默认为 7 天
     */
    public function set_Out_time($where,$day){
        $data = $this->get_filebedInfo($where);
        $data['state'] = 1;
        $data['out_time'] = date("Y-m-d", strtotime('+'.$day." day ".$data['out_time']));
        temege::save($data,$where);
    }
    /**
     * 将文件设置为过期，但不删除文件
     */
    public function set_Out($where){
        $data = $this->get_filebedInfo($where);
        $data['state'] = 0;
        $data['out_time'] = date('Y-m-d');
        temege::save($data,$where);
    }
    /**
     * 将文件置顶，也就是一直不过期，将日期设为0000-00-00
     */
    public function set_Top($where){
        $data = $this->get_filebedInfo($where);
        $data['out_time'] = '0000-00-00';
        $data['state'] = 1;
        temege::save($data,$where);
    }
}