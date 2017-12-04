<?php 
/**
* 
*/
class UploadAction extends Action {
	  public function upload(){
       import('ORG.Net.UploadFile');
            $upload = new UploadFile();// 实例化上传类
            $upload->maxSize  = 3145728 ;// 设置附件上传大小
            $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->uploadReplace= true;
            $upload->savePath =  './Public/Uploads/';// 
            if(!$upload->upload()) 
            {// 上传错误提示错误信息
                $data['a']=$upload->getErrorMsg();
                $data['status']='1';
                echo json_encode($data);
                exit;    
            }
            else
            {// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
            }
            $file="/Public/Uploads/".$info[0]['savename'];
            echo json_encode($file);
                 }
}