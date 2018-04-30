<?php
namespace app\admin\controller;
use app\config\model\Message;
use app\config\model\Temege;
use app\config\model\User;
use Symfony\Component\Yaml\Unescaper;
use think\Controller;
use \think\Request;
use \think\View;
class Index extends Common{
    public function index(){
        $user_model = new User();
        $login_num = count($user_model->get_UserList(array('login_time'=>date('Y-m-d'))));
        $regster_num = count($user_model->get_UserList(array('register_time'=>date('Y-m-d'))));
        return view('index',array('login_num'=>$login_num,'register_num'=>$regster_num));
//        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }
    public function temege(){
        $id = Request::instance()->get('id',0);
        if ($id==0){$id=1;}
        $temege_model = new Temege();
        $list = $temege_model->get_temegeList(array('ParentId'=>$id));
        $temege = $temege_model->get_temegeInfo(array('id'=>$id));
        if (empty($temege)){$temege['img'] = '';$temege['word']='';$temege['mp3']='';$temege['id'] = $id;}
        if ($temege['img']=='0'){$temege['img']='/public/img/1.jpg';}
        if ($temege['img']==''){$temege['img']='/public/img/1.jpg';}
        if (empty($temege['word'])){$temege['word']='';}
        return view('temege',array('list'=>$list,'temege'=>$temege));
    }
    public function delete(){
        $id = Request::instance()->get('id',0);
        $type = Request::instance()->get('type',0);
        if ($type==2){
            if ($id>1){
                $temege_model = new Temege();
                $data = $temege_model->get_temegeInfo(array('id'=>$id));
                $temege_model->delete_temegeInfo(array('id'=>$id));
                /** 用上一级id作为引导 */
                $this->success('删除成功','/admin.php/admin/index/temege?id='.$data['ParentId'],'',1);
            }
        }
        $this->redirect('/admin.php/admin/index/temege?id='.$id);

    }
    public function insert(){
        $id = Request::instance()->get('id',0);
        $tip = Request::instance()->post('tip',0);
        $temege_model = new Temege();
        if ($tip!=0){
            $id = Request::instance()->post('id',0);
            $type = Request::instance()->post('type',0);
            if ($type==0){
                $data['word'] = Request::instance()->post('word','');
                $data['Meaning'] = Request::instance()->post('Meaning','');
                $img = upload_file('img');
                if ($img!='0'){$data['img']=$img;}
                $mp3 = upload_file('mp3');
                if ($mp3!='0'){$data['mp3']=$mp3;}
                $data['ParentId'] = $id;
                $temege_model->insert_temegeInfo($data);
                $this->success('添加成功','/admin.php/admin/index/temege?id='.$id,'',1);
            }else{
                $data = $temege_model->get_temegeInfo(array('id'=>$id));
                $data['word'] = Request::instance()->post('word','');
                $data['Meaning'] = Request::instance()->post('Meaning','');
                $img = upload_file('img');
                if ($img!='0'){$data['img']=$img;}
                $mp3 = upload_file('mp3');
                if ($mp3!='0'){$data['mp3']=$mp3;}
                $temege_model->save_temegeInfo($data,array('id'=>$id));
                $this->success('修改成功','/admin.php/admin/index/temege?id='.$id,'',1);
            }
        }else{
            /** @var  $type   0 是添加*/
            $type = Request::instance()->get('type',0);
            if ($type==0){
                $data['word'] = '';
                $data['Meaning'] = '';
                $data['ParentId'] = '';
                $data['img'] = '';
            }else{
                $data = $temege_model->get_temegeInfo(array('id'=>$id));
            }
        }
        return \view('insert',array('id'=>$id,'type'=>$type,'data'=>$data));
    }
    public function test(){
        return view('test');
    }
    public function message(){
        $message_model = new Message();
        $list = $message_model->get_MessageList();
        return \view('message',array('list'=>$list));
    }
}
