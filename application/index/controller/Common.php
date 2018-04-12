<?php
/**
 * Created by PhpStorm.
 * User: Rain
 * Date: 2017/10/25
 * Time: 16:57
 */

namespace app\index\controller;
use think\Controller;

class Common extends Controller {
    public function __construct(){
        /** 设置PHP请求的编码类型 */
        header("Content-type: text/html; charset=utf-8");
        /** 设置报错形式 */
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
        parent::__construct();
        /** 调用函数判断是否已经登录 */
        $this->_init();
        /** 获取登录的状态 */
        $isLogin = $this->isLogin();
        if (!$isLogin) {
            $login_state = '0';
        }else{
            $login_state = '1';
        }
        /** 将login_state的值返回到所有页面中 */
        $this->assign('login_state',$login_state);
    }

    /**
     * 初始化
     * @return
     */
    private function _init(){

       //  如果已经登录
        $isLogin = $this->isLogin();
        if (!$isLogin) {
            /** 这里没有登录时不直接跳转到登录页面，因为体验不好，只定位到首页中 */
            $this->assign('User',array('username'=>'0'));
            // 跳转到登录页面
//            $this->redirect('/index.php/index/login/index');
        }else{
            $this->assign('User',session('User'));
        }

    }

    /**
     * 获取登录用户信息
     * @return array
     */
    public function getLoginUser()
    {
        return session("User");
    }

    /**
     * 判定是否登录
     * @return boolean
     */
    public function isLogin()
    {
        $user = $this->getLoginUser();
        if ($user && is_array($user)) {
            return true;
        }

        return false;
    }
    public function _empty(){
        echo "不存在的方法";
    }

}