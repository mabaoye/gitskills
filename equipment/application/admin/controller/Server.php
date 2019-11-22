<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Paginator;
use think\Db;
use think\Session;
use think\Validate;

class Server extends Controller
{
	public function server()
	{  
		return $this->fetch();
	}
}