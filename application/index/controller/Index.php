<?php
namespace app\index\controller;
use app\admin\controller\Mori;
use app\config\model\CommentM;
use app\config\model\Experiment;
use app\config\model\HoniM;
use app\config\model\MoriM;
use app\config\model\Temege;
use app\config\model\UherM;
use app\config\model\YimagaM;
use think\Controller;
use \think\Request;
use \think\View;
class Index extends Common {
    public function index(){

        return view('index');
//        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }
    public function temege(){
        $id = Request::instance()->get('id',0);
        if ($id==0){$id=1;}
        $temege_model = new Temege();
        $list = $temege_model->get_temegeList(array('ParentId'=>$id));
        $temege = $temege_model->get_temegeInfo(array('id'=>$id));
        if ($temege['img']==''){$temege['img']='/public/img/1.jpg';}
        else if ($temege['img'][1]!='p'){$temege['img']='/public/file/'.$temege['img'];}
        return view('temege',array('list'=>$list,'temege'=>$temege));
    }
    public function mori(){
        $id = Request::instance()->get('id',0);
        if ($id==0){$id=1;}
        $temege_model = new MoriM();
        $list = $temege_model->get_moriList(array('ParentId'=>$id));
        $temege = $temege_model->get_moriInfo(array('id'=>$id));
        if ($temege['img']==''){$temege['img']='/public/img/ma.jpg';}
        else if ($temege['img'][1]!='p'){$temege['img']='/public/file/'.$temege['img'];}
        return view('mori',array('list'=>$list,'temege'=>$temege));
    }
    public function yimaga(){
        $id = Request::instance()->get('id',0);
        if ($id==0){$id=1;}
        $temege_model = new YimagaM();
        $list = $temege_model->get_yimagaList(array('ParentId'=>$id));
        $temege = $temege_model->get_yimagaInfo(array('id'=>$id));
        if ($temege['img']==''){$temege['img']='/public/img/mianyang.jpg';}
        else if ($temege['img'][1]!='p'){$temege['img']='/public/file/'.$temege['img'];}
        return view('yimaga',array('list'=>$list,'temege'=>$temege));
    }
    public function honi(){
        $id = Request::instance()->get('id',0);
        if ($id==0){$id=1;}
        $temege_model = new HoniM();
        $list = $temege_model->get_honiList(array('ParentId'=>$id));
        $temege = $temege_model->get_honiInfo(array('id'=>$id));
        if ($temege['img']==''){$temege['img']='/public/img/shanyang.jpg';}
        else if ($temege['img'][1]!='p'){$temege['img']='/public/file/'.$temege['img'];}
        return view('honi',array('list'=>$list,'temege'=>$temege));
    }
    public function uher(){
        $id = Request::instance()->get('id',0);
        if ($id==0){$id=1;}
        $temege_model = new UherM();
        $list = $temege_model->get_uherList(array('ParentId'=>$id));
        $temege = $temege_model->get_uherInfo(array('id'=>$id));
        if ($temege['img']==''){$temege['img']='/public/img/niu.jpg';}
        else if ($temege['img'][1]!='p'){$temege['img']='/public/file/'.$temege['img'];}
        return view('uher',array('list'=>$list,'temege'=>$temege));
    }
    public function seach(){
        $tip = Request::instance()->post('tip',0);
        $type = Request::instance()->get('type',0);
        if ($type==0){
            $temege_model = new MoriM();
            if ($tip==0){
                $list = $temege_model->get_moriList();
            }else{
                $content = Request::instance()->post('content','');
                $list = $temege_model->get_moriList(array('word'=>$content));
            }
            $status = 'mori';
        }else if ($type==1){
            $temege_model = new Temege();
            if ($tip==0){
                $list = $temege_model->get_temegeList();
            }else{
                $content = Request::instance()->post('content','');
                $list = $temege_model->get_temegeList(array('word'=>$content));
            }$status = 'temege';
        }else if ($type==2){
            $temege_model = new UherM();
            if ($tip==0){
                $list = $temege_model->get_uherList();
            }else{
                $content = Request::instance()->post('content','');
                $list = $temege_model->get_uherList(array('word'=>$content));
            }$status = 'uher';
        }else if ($type==3){
            $temege_model = new HoniM();
            if ($tip==0){
                $list = $temege_model->get_honiList();
            }else{
                $content = Request::instance()->post('content','');
                $list = $temege_model->get_honiList(array('word'=>$content));
            }$status = 'honi';
        }else if ($type==4){
            $temege_model = new YimagaM();
            if ($tip==0){
                $list = $temege_model->get_yimagaList();
            }else{
                $content = Request::instance()->post('content','');
                $list = $temege_model->get_yimagaList(array('word'=>$content));
            }$status = 'yimaga';
        }
        return \view('seach',array('list'=>$list,'type'=>$type,'status'=>$status));
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
