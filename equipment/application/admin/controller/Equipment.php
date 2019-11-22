<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Paginator;
use think\Db;
use think\Session;
use think\Validate;

class Equipment extends Controller
{
	public function equipment()
	{  
        $keyword = Request::instance()->param('keyword');
        $equipments = Db::table('t_equipment')->where(['state' => 1,'equipment' => ['like',"%$keyword%"]])->paginate(10, false, ['query'=>[request()->param()]]);
        $this->assign("equipments", $equipments);	
		return $this->fetch();
	}

	public function add()
	{ 
		if (Request::instance()->isPost()) {
            $equipment_type = input('post.equipment_type');
            $equipment = input('post.equipment');
            $ip = input('post.ip');
            $community = input('post.community');
            $produce = input('post.produce');
            $brand = input('post.brand');
            $type = input('post.type');
            $mark = input('post.mark');
            $data = array('equipment_type' => $equipment_type, 'equipment' => $equipment, 'ip' => $ip, 'community' => $community, 'produce' => $produce, 'brand' => $brand, 'type' => $type, 'mark' => $mark);
            $result = Db::table('t_equipment')->insert($data);
            if ($result == true) {
                $this->success('添加成功',url('equipment'));
            } else {
                $this->error('添加失败');
            }
        } else {
            return $this->fetch();
        }
	}

	public function edit()
    {
        
    	$equipment_id = Request::instance()->param('equipment_id');
        if (Request::instance()->isPost()) {
            $equipment_type = input('post.equipment_type');
            $equipment = input('post.equipment');
            $ip = input('post.ip');
            $community = input('post.community');
            $produce = input('post.produce');
            $brand = input('post.brand');
            $type = input('post.type');
            $mark = input('post.mark');
            $data = array('equipment_type' => $equipment_type, 'equipment' => $equipment, 'ip' => $ip, 'community' => $community, 'produce' => $produce, 'brand' => $brand, 'type' => $type, 'mark' => $mark);
            $result = Db::table('t_equipment')->where('equipment_id',$equipment_id)->update($data);
            if ($result == true) {
                $this->success('更新成功',url('equipment'));
            } else {
                $this->error('更新失败');
            }
        } else {
            $equipmentInfo = Db::table('t_equipment')->where('equipment_id',$equipment_id)->find();
            $this->assign('equipment',$equipmentInfo);
            return view('edit');
        }
    }

    public function delete()
	{  
		$equipment_id = Request::instance()->param('equipment_id');
        $where = array('equipment_id'=>$equipment_id);
        $data = array('state' => '0');
        $result = Db::table('t_equipment')->where($where)->update($data);
        if ($result == 1) {
            $this->success('删除成功', url('equipment'));
        } else {
            $this->error('删除失败');
        }
	}
}