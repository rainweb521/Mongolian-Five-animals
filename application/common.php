<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Request;
use think\Session;
use think\Controller;


/** 上传图片函数，还可以对图片格式，大小进行验证， 并对图片进行压缩
 * @param $name
 * @return int|string
 */
function upload_file($name){
    $image = \request()->file($name);
    if($image){
        /**
         * //判断图片文件的格式
         * 判断图片大小 最大为10mb
         */
        $info = $image->validate(['ext'=>'jpg,png,jpeg,mp3'])->move(ROOT_PATH . 'public' . DS . 'uploads');
//             echo $info->getSize();
//        $info->getExtension()   //判断图片文件的格式
//        $info->getSize()>10000000 //判断图片文件的格式
        if($info){
            $image_src = '/public/uploads/'.$info->getSaveName();
            return $image_src;
        }else{
            return '0';
        }
    }else{
        return '0';
    }
}

?>