<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$data=D('category');
		$s['parent_id']=0;//根目录
		$category=$data->where($s)->select();//查询出所有根目录ID
		foreach($category as $key=>$value){
			$s['parent_id']=$value['cat_id'];
			$catrs[]=$data->where($s)->count();
			
			//print_r($catrs);
		}
		$this->assign('catnum',$catrs);
		
		//
		//print_r($data);
		$this->assign('category',$category);
		
		$this->display();
    }
	
	//添加大类
	public function add(){
		$data=I('post.cat');
		if($data){
		$data=rtrim(preg_replace('/[\r\n]+/', "\n\r",$data));//去掉空行
		$catarr=explode("\n",$data);//将每行数据转变为数组
		//新增大类
		$category=D('Category');
		foreach($catarr as $key=>$value){
			$colum['cat_name']=$value;
			$colum['keywords']='';
			$colum['cat_desc']='';
			$colum['parent_id']='0';
			$colum['sort_order']='50';
			$colum['template_file']='';
			$colum['measure_unit']='';
			$colum['show_in_nav']='0';
			$colum['style']='';
			$colum['is_show']='1';
			$colum['grade']='0';
			$colum['filter_attr']='';
			$colum['is_wshow']='0';
			if($category->create($colum)){
				$category->add();
			}
		}
		$this->success('批量添加大类成功',__CONTROLLER__);
		
		}else{
			$this->display();
		}
	}
	
	//添加对应小类
	public function sadd(){
		$sdata=I('post.');
		if($sdata){
			$scat=str_replace(chr(32),"\n",$sdata['scat']);//去掉空行
			//$scat=rtrim(preg_replace('/[\r\n]+/', "\n",$sdata['scat']));//去掉空行
			$sarr=explode("\n",$scat);//将每行数据转变为数组
		//批量新增小类
		$category=D('Category');
		foreach($sarr as $key=>$value){
			$colum['cat_name']=$value;
			$colum['keywords']='';
			$colum['cat_desc']='';
			$colum['parent_id']=$sdata['big_id'];
			$colum['sort_order']='50';
			$colum['template_file']='';
			$colum['measure_unit']='';
			$colum['show_in_nav']='0';
			$colum['style']='';
			$colum['is_show']='1';
			$colum['grade']='0';
			$colum['filter_attr']='';
			$colum['is_wshow']='0';
			if($category->create($colum)){
				$category->add();
			}
		}
			$this->success('批量添加小类成功',__CONTROLLER__);
			exit;
		}
		$big_id=I('get.id');
		$category=D('Category');
		$colum['cat_id']=$big_id;
		$colum['parent_id']='0';
		$colum['_logic']='AND';
		$rs=$category->where($colum)->select();
		$this->assign('bigcat',$rs[0]['cat_name']);
		($rs)?$this->display():die('非法操作');//与数据库匹配	
		
	}
	
	public function test(){
		$sdata=I('post.');
		if($sdata){
			$scat=str_replace(chr(32),"\n",$sdata['scat']);//去掉空行
			$sarr=explode("\n",$scat);//将每行数据转变为数组
			print_r($sarr);
		}else{
			$this->display();
		}
	}
}