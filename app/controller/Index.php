<?php
namespace app\controller;

use app\BaseController;
use think\cache\driver\Redis;
use think\facade\Config;

class Index extends BaseController
{
    public function index()
    {
    	// 123456
    	$redis = new Redis(Config::get('cache.stores.redis'));
    	$id = rand(1,1000);
    	
    	// $r = $redis->set('lock', time(), 100);
    	// for ($i=0; $i < 50; $i++) { 
    	// 	$redis->lPush('list-key', 'A');
    	// }
    	// dump(123);
    	// die;
    	
    		// $lua = "
	        //     local key   = KEYS[1]
	        //     local value = ARGV[1]
	            
	        //     if(redis.call('get', key) == value)
	        //     then
	        //         return redis.call('del', key)
	        //     end";

            // $result = $redis->eval($lua, ['lock', 123], 1);

    	// if (!$redis->sismember('jh', $id)) {
    		// if ($redis->rPop('list-key')) {
    		// 	$redis->sadd('jh', $id);
	    	// 	file_put_contents('3.txt', "\n已抢到".$id, FILE_APPEND);
	    	// } else {
	    	// 	// file_put_contents('3.txt', "\n未抢到".$id, FILE_APPEND);
	    	// }
    	// }
    	
    	$lua = "
	            local r = redis.call('sismember', KEYS[1], ARGV[1])
	            if ( r == 0 )
	            then
	            	redis.call('sadd', KEYS[1], ARGV[1])
	            	return redis.call('rPop', 'list-key')
	            end	             
	            ";

            $result = $redis->eval($lua, ['jh', $id], 1);
            
            if ($result) {

            	file_put_contents('4.txt', "\n已抢到".$id, FILE_APPEND);
            } else {
            	// file_put_contents('4.txt', "\n未抢到".$id, FILE_APPEND);
            }
        
    }

    public function hello($name = 'ThinkPHP6')
    {
        return 'hello,' . $name;
    }
}
