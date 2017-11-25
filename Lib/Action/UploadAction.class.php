<?php 
/**
* 
*/
class UploadAction extends Action {
	  public function upload(){
	  	 /*$arr_ext = explode('.', $_FILES["upfile"]["name"]);  
            $path = "./Uploads/".date('Ymd').'/';  
            if(!is_dir($path)){  
                mkdir($path,0777,true);  
            }  
            $file_path = $path.uniqid().'.'.$arr_ext[1];  
            //复制图片  
            if(move_uploaded_file($_FILES["upfile"]["tmp_name"], $file_path)){  
               $this->ajaxReturn(array('ok'));  
            }else{  
                  $this->ajaxReturn(array('fail'));  
            }  */
	  		print_r($_FILES["upfile"]["name"]);
	  		exit;
	  }
}