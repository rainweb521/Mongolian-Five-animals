<?php
namespace app\admin\controller;
use app\config\model\Experiment;
use app\config\model\filebed;
use app\config\model\key_password;
use app\config\model\User;
use \think\Controller;
use \think\Request;
use \think\View;
class Login extends Controller{
    public function index(){
        // 提交表单的操作，判断是否有提交
        $flag = Request::instance()->post('flag',0);
        $state = '';
        if($flag==1){
            $a_username = Request::instance()->post('a_username','');
            $a_password = Request::instance()->post('a_password','');
            $data = array('a_username'=>'admin','a_password'=>'admin');
            if ($data==NULL){
                $state = "用户名不存在";
            }else if ($data['a_password']!=$a_password){
                $state = "密码错误";
            }else{
                session('AdminUser',$data);
//                start_session(6000);
                $this->redirect('/admin.php/admin/index');
                exit();
            }
        }
        $this->assign('state',$state);
        return \view('index');
    }

    /**
     * 登出操作
     */
    public function logout() {
        session('AdminUser', null);
        $this->redirect('/admin.php/admin/index');
        exit();
//        $this->get_session();
    }
}
