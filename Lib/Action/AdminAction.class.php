<?php 
/**
* 
*/
class AdminAction extends Action {
	
	function index(){
		if(!session('username')){
		 	$this->error('请先登录',U('Admin/login'));
		} 
		$this->display();
	}

	function login(){
		if($this->isPost()){
			$user = M("User"); // 实例化User对象
			$username=$this->_POST('username');	//获取输入的用户名
			$password=$this->_POST('password');	//	获取输入的密码
			$i=$user->where("username='".$username."'")->find();
			if ($i) {
				if (MD5($password)==$i['password']) {
					session('username',$username);
					$this->success('正在登陆，请稍后',U('Admin/index'));
				}else{
					$this->error('密码错误，请确认后重试',U('Admin/login'));
				}
			}else{
				$this->error('用户名不存在，请确认后重试',U('Admin/login'));
			}
		}else{
		 $this->display();
		}
	}
	function loginout(){
     session('username',null);
	 $this->success('退出成功！','login');
	}
	function basic(){
		if($this->isPost()){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->uploadReplace= true;
			$upload->savePath =  './Public/Uploads/';// 
			if(!$upload->upload()) 
			{// 上传错误提示错误信息
			}
			else
			{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			}
			// 保存表单数据 包括附件数据
			$g=M('basic');
			if($info){
			$data['logo']="../Public/Uploads/".$info[0]['savename'];
			$data['file']="../Public/Uploads/".$info[1]['savename'];	
			}
			$data['title']=$this->_POST('title');
			
			$data['content']=$this->_POST('content');

			$data['description']=$this->_POST('description');
			$data['icp']=$this->_POST('icp');
			$data['seo']=$this->_POST('seo');
			$data['company']=$this->_POST('company');
			if($g->where("id=1")->select()){
			$g->where("id=1")->save($data);
			
			$this->success('修改成功',U('basic'));
			}else{
			$g->add($data);	
			$this->success('添加成功',U('basic'));
			}
		}else{
			$g=M('basic');
			$i=$g->where("id=1")->find();
		    $this->assign('data',$i);
			$this->display();
		}
		 
	}
	public function contact(){
		if($this->_post()){
			$data=$this->_POST();
			$g=M('contact');
			if($g->where("id=1")->find){
			$g->where("id=1")->save($data);
			$this->success('修改成功',U('basic'));
			}else{
			$g->add($data);
			$this->success('添加成功',U('contact'));
			}
			
		}else{
			$g=M('contact');
			$i=$g->where("id=1")->find();
		    $this->assign('data',$i);
			$this->display();
		}
	}

}


?>