<?php
namespace app\controller;

use app\BaseController;
use think\cache\driver\Redis;
use think\facade\Config;
use app\controller\TestInit;

class Test extends TestInit
{

	public function initialize()
	{
		echo "initialize_son";
	}

    public function index()
    {
        
    	echo 111;
    }

    
}
