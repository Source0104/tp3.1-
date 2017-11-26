<?php 
/**
* 文件上传公共方法
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
	  	/* $arr_ext = explode('.', $_FILES["upfile"]["name"]);  
            $path = "./Public/Uploads";  
            if(!is_dir($path)){  
                mkdir($path,0777,true);  
            }  
            $file_path = $path.uniqid().'.'.$arr_ext[1];  
            //复制图片  
            if(move_uploaded_file($_FILES["upfile"]["tmp_name"], $file_path)){  
               $this->ajaxReturn(array('ok'));  
            }else{  
                  $this->ajaxReturn(array('fail'));  
            }  
               echo $_FILES["upfile"]; */
               $file="/Public/Uploads/".$info[0]['savename'];
               echo json_encode($file);
                 }
}