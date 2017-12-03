<?php
/*****
	Zhaolong 2017/11/21
	联系方式 QQ：296476710
******/
class IndexAction extends Action {
    public function index(){			/***首页***/
        $g=M('basic');
        $i=$g->where('id=1')->find();
        $this->assign('data',$i);
        $this->display('index');
    }
    public function contact(){			/**联系我们**/
      $this->display();
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
    public function short(){
      $this->display();
    }
    public function typography(){
      $this->display();
    }
}