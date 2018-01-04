<?php
namespace app\index\controller;
use app\config\model\CommentM;
use app\config\model\Experiment;
use app\config\model\filebed;
use app\config\model\key_password;
use app\config\model\Temege;
use think\Controller;
use \think\Request;
use \think\View;
class Index extends Common {
    public function index(){
        $isLogin = $this->isLogin();
        if (!$isLogin) {
            $login_state = '未登录';
        }else{
            $login_state = '已登录';
        }
        return view('index',array('login_state'=>$login_state));
//        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }
    public function temege(){
        $id = Request::instance()->get('id',0);
        if ($id==0){$id=1;}
        $temege_model = new Temege();
        $list = $temege_model->get_temegeList(array('ParentId'=>$id));
        $temege = $temege_model->get_temegeInfo(array('id'=>$id));
        if ($temege['img']==''){$temege['img']='/public/img/1.jpg';}
        else{$temege['img']='/public/file/'.$temege['img'];}
        return view('temege',array('list'=>$list,'temege'=>$temege));
    }
    public function seach(){
        $tip = Request::instance()->post('tip',0);
        $temege_model = new Temege();
        if ($tip==0){
            $list = $temege_model->get_temegeList();
        }else{
            $content = Request::instance()->post('content','');
            $list = $temege_model->get_temegeList(array('word'=>$content));
        }
        return \view('seach',array('list'=>$list));
    }

    public function test(){
        $e_id = Request::instance()->get('e_id',1);
        if ($e_id==0){$e_id=1;}
        $experiment_model = new Experiment();
        $data = $experiment_model->get_ExperimentInfo(array('e_id'=>$e_id));
        return \view('test',array('data'=>$data));
//        return \view('test');
    }
    public function comment(){
        $tip = Request::instance()->post('tip',0);
        if ($tip==1){
            if ($this->isLogin()){
                $User = session('User');
                $data['content'] = Request::instance()->post('content','');
                $data['u_id'] = $User['u_id'];
                $data['username'] = $User['username'];
                $data['photo'] = $User['photo'];
                $data['e_id'] = Request::instance()->post('e_id',1);
                $data['e_title'] = Request::instance()->post('e_title','');
                $data['add_time'] = date('Y-m-d');
                $data['state'] = 1;
                $data['status'] = 1;
                $data['node'] = 0;
                $data['type'] = 'User';
                $comment_model = new CommentM();
                $comment_model->insert_CommentMInfo($data);
                $this->success('评论成功');
            }
        }
        $this->error('您还未登录');
    }

}
