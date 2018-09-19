<?php
namespace app\index\controller;
use think\cache\driver\Redis;
//use think\Cache;
use think\Controller;
use think\Db;
use think\facade\Config;
use think\Facade\Env;
use think\Facade\Log;
use think\Facade\Debug;
class IndexRedis extends Controller
{

    protected $redisHandler = null;

    public function __construct(){
        if(empty($this->_redis)){
            $redis = new Redis();
            $this->redisHandler = $redis->getHandler();
        }
    }

    public function index()
    {
        Debug::remark('begin');
        $count = $this->redisHandler->get('goods');
        if($count<=0){
//            return false;
        }else{
            $data = ['name' => '刘金生', 'mc' => rand(1,3),'status'=>1,'createtime'=>time()];
            Db::name('order')
                ->data($data)
                ->insert();
//            $data = json_encode(['name' => '刘金生', 'sex' => rand(1,2),'status'=>1,'createtime'=>time()]);
            $this->redisHandler->rpush('mylist',$data);
            $this->redisHandler->decr('goods', 1);
        }
        dump($count);
        dump($this->redisHandler->llen('mylist'));

//        $data = json_encode(['name' => '刘金生', 'sex' => rand(1,2),'status'=>1,'createtime'=>time()]);
//        $redisHandler->rpush('mylist',$data);
//        $redisHandler->rpush('mylist',$data);

//        $result = $this->redisHandler->rpop('mylist');
//
//        dump($result);
//        dump($redisHandler->llen('mylist'));


//        $result = Db::name('user')->find();
//        $redis ->pull('userInfo',$result);
//        $redis ->set('userInfo','1111');
//        dump($redis->get('userInfo'));


        //$this->handler = new \Redis;



//        $redis->clear();
//        for($i=0;$i<10000;$i++){
//            dump($redis->get($i));
//        }



        //dump($redis->get(3));


//        $data = ['name' => '刘金生', 'sex' => rand(1,2),'status'=>1,'createtime'=>time()];
//        $data = json_encode($data);
//        $rand = rand(1,10000);
//        $redis->set($rand, $data);
//        $userInfo = $redis->get($rand);
//        dump(json_decode($userInfo));
        Debug::remark('end');
        echo Debug::getRangeTime('begin','end').'s';


//        if($redis->get('usrInfe')){
//            return json_decode();
//        }else{
//
//        }

    }

    /**
     * 初始化redis
     * @access public
     * @param  array $options 缓存参数
     */
    public function initRedis()
    {

        $this->redisHandler->del('goods');
        $this->redisHandler->del('mylist');
        $this->redisHandler->set('goods',50);

        dump($this->redisHandler->get('goods'));
    }

}
