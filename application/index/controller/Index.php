<?php
namespace app\index\controller;
use app\admin\controller\Mori;
use app\config\model\CommentM;
use app\config\model\Experiment;
use app\config\model\HoniM;
use app\config\model\Message;
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
    }

    public function temege(){
        /** 获取动物的id*/
        $id = Request::instance()->get('id',0);
        if ($id==0){$id=1;}
        /** 实例化对应动物的model */
        $temege_model = new Temege();
        /** 根据动物的id，获取所有和它有归属关系的其他属性 */
        $list = $temege_model->get_temegeList(array('ParentId'=>$id));
        /** 获取对应id的属性的全部内容 */
        $temege = $temege_model->get_temegeInfo(array('id'=>$id));
        /** 如果这个属性没有图片，就使用默认的图片 */
        if ($temege['img']==''){$temege['img']='/public/img/1.jpg';}
        else if ($temege['img'][1]!='p'){$temege['img']='/public/file/'.$temege['img'];}
        /** 返回对应的显示页面，并带入属性列表的值和属性的值 */
        return view('temege',array('list'=>$list,'temege'=>$temege));
    }
    /** 和上面的类似 */
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
    /** 和上面的类似 */
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
    /**  和上面的类似 */
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
    /** 和上面的类似 */
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
        /**
         * 获取对应的tip和type
         * type是get请求中的参数，因为每个动物的页面都有查找功能，
         * 所以我要区分开是要查找哪个动物的信息，并把它的属性列表全部查找出来
         * tip是post请求的参数，也就是在搜索框中输入内容后点击提交，就会触发
         * 这个值可以用来判断有没有搜索的行为发生，如果有，那就将输入框的内容获取到，再去数据库中查询
         *
         */
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
    public function comment_show(){
        return \view('comment');
    }
    public function comment(){
        $data['content'] = Request::instance()->post('content','');
        $data['email'] = Request::instance()->post('email','');
        $data['time'] = date('Y-m-d');
        $message_model = new Message();
        $message_model->insert_MessageInfo($data);
        $this->success('评论成功','/index.php/index/index');
    }

}
