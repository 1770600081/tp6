<?php
namespace app\controller;

use app\BaseController;
use think\cache\driver\Redis;
use think\facade\Config;

class TestInit extends BaseController
{

	public function initialize()
	{
		echo "initialize";
	}

}
