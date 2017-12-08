<?php
/*****
	Zhaolong 2017/11/21
	联系方式 QQ：296476710
******/
class IndexAction extends Action {
    public function index(){			/***首页***/
        $g=M('basic');
        $i=$g->where('id=1')->find();  
        $s=M('news');
        $news=$s->order('id desc')->limit('5')->select();
        $this->assign('news',$news);
        $this->assign('data',$i);
        $this->display('index');
    }
    public function contact(){			/**联系我们**/
      $g=M('basic');
        $i=$g->where('id=1')->find();
        $c=M('contact');
        $contact=$c->where('id=1')->find();
       $this->assign('data',$i);
       $this->assign('contact',$contact); 
       $this->display();
    }
      public function message(){      /**留言**/
      $user = M("message"); // 实例化User对象
      $data=$this->_post();
      $data['time']=time();
      $user->add($data); 
      $this->success('添加成功',U('contact'));
      }
    public function about(){			/****关于我们****/
       $g=M('basic');
        $i=$g->where('id=1')->find();
        $i['content']= str_replace("&lt;","<",$i['content']);
        $i['content']= str_replace("&gt;",">",$i['content']);
        $i['content']= str_replace("&quot;","\"",$i['content']);
      
        $this->assign('data',$i);
      $this->display();
    }
    public function products(){			/**产品展示**/
      $g=M('basic');
      $i=$g->where('id=1')->find();
      $s=M('goods');
      $goods=$s->select();
      $this->assign('data',$i);
      $this->assign('goods',$goods);
      $this->display();
    }
    public function news(){
      $g=M('basic');
      $i=$g->where('id=1')->find();
       $s=M('news');
      import('ORG.Util.Page');
        $count      = $s->count();
        $Page       = new Page($count,20);
        $show       = $Page->show();
      $news=$s->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
      $this->assign('page',$show);
      $this->assign('data',$i);
      $this->assign('news',$news);
      $this->display();
    }
    public function newsview($id=''){
        $s=M('news');
         $news=$s->where("id=$id")->find();

        $this->assign('news',$news);
        $this->display();
    }
    /*public function typography(){
      $this->display();
    }*/
}