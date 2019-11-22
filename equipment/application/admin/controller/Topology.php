<?php
namespace app\admin\controller;

use think\Db;
use think\Controller;
use think\Request;

class Topology extends Controller
{
	public function topology()
	{
		return $this->fetch();
	}
}