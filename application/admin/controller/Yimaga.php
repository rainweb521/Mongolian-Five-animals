<?php
namespace app\admin\controller;
use app\config\model\YimagaM;
use think\Controller;
use \think\Request;
use \think\View;
class Yimaga extends Common{
    public function index(){
        $id = Request::instance()->get('id',0);
        if ($id==0){$id=1;}
        $mori = new YimagaM();
        $list = $mori->get_yimagaList(array('ParentId'=>$id));
        $temege = $mori->get_yimagaInfo(array('id'=>$id));
        if (empty($temege)){$temege['img'] = '';$temege['word']='';$temege['id'] = $id;}
        if ($temege['img']==''){$temege['img']='/public/img/mianyang.jpg';}
        else if ($temege['img'][1]!='p'){$temege['img']='/public/file/'.$temege['img'];}
        if (empty($temege['word'])){$temege['word']='';}
        return view('index',array('list'=>$list,'temege'=>$temege));
//        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }
    public function delete(){
        $id = Request::instance()->get('id',0);
        $type = Request::instance()->get('type',0);
        if ($type==2){
            if ($id>1){
                $temege_model = new YimagaM();
                $data = $temege_model->get_yimagaInfo(array('id'=>$id));
                $temege_model->delete_yimagaInfo(array('id'=>$id));
                /** 用上一级id作为引导 */
                $this->success('删除成功','/admin.php/admin/yimaga/index?id='.$data['ParentId'],'',1);
            }
        }
        $this->redirect('/admin.php/admin/yimaga/index?id='.$id);

    }
    public function insert(){
        $id = Request::instance()->get('id',0);
        $tip = Request::instance()->post('tip',0);
        $temege_model = new YimagaM();
        if ($tip!=0){
            $id = Request::instance()->post('id',0);
            $type = Request::instance()->post('type',0);
            if ($type==0){
                $data['word'] = Request::instance()->post('word','');
                $data['Meaning'] = Request::instance()->post('Meaning','');
                $img = request()->file('img');
                if($img){
                    $info = $img->move(ROOT_PATH . 'public' . DS . 'img');
                    if($info){
//                    $data = $experiment_model->get_ExperimentInfo(array('e_id'=>$e_id));
                        $data['img'] = '/public/img/'.$info->getSaveName();
//                    $experiment_model->save_ExperimentInfo($data,array('e_id'=>$e_id));
//                    $this->success('上传成功','/admin.php/admin/experiment');
                    }else{
                        $this->error('上传失败，可能出现的原因：'.$img->getError());
                    }
                }else{
                    /** 没有上传文件 */
                    $data['img'] = '';
                }
                $data['ParentId'] = $id;
                $temege_model->insert_yimagaInfo($data);
                $this->success('添加成功','/admin.php/admin/yimaga/index?id='.$id,'',1);
            }else{
                $data = $temege_model->get_yimagaInfo(array('id'=>$id));
                $data['word'] = Request::instance()->post('word','');
                $data['Meaning'] = Request::instance()->post('Meaning','');
                $img = request()->file('img');
                if($img){
                    $info = $img->move(ROOT_PATH . 'public' . DS . 'img');
                    if($info){
//                    $data = $experiment_model->get_ExperimentInfo(array('e_id'=>$e_id));
                        $data['img'] = '/public/img/'.$info->getSaveName();
//                    $experiment_model->save_ExperimentInfo($data,array('e_id'=>$e_id));
//                    $this->success('上传成功','/admin.php/admin/experiment');
                    }else{
                        $this->error('上传失败，可能出现的原因：'.$img->getError());
                    }
                }else{
                    /** 没有上传文件 */
//                    $data['img'] = '';
                }
                $temege_model->save_yimagaInfo($data,array('id'=>$id));
                $this->success('修改成功','/admin.php/admin/yimaga/index?id='.$id,'',1);
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
                $data = $temege_model->get_yimagaInfo(array('id'=>$id));
            }
        }
        return \view('insert',array('id'=>$id,'type'=>$type,'data'=>$data));
    }
    public function test(){
        return view('test');
    }
}
