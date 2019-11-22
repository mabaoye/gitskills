<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Paginator;
use think\Db;
use think\Session;
use think\Validate;

class Prowl extends Controller
{
	public function prowl()
	{  
		return $this->fetch();
	}
}