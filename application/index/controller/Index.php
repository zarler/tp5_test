<?php
namespace app\index\controller;
use think\cache\driver\Redis;
//use think\Cache;
use think\Db;
use think\facade\Config;
use think\Facade\Env;
use think\Facade\Log;
use think\Facade\Debug;
class Index
{
    public function index()
    {

//        trace('错误信息','sql');

//        Debug::remark('begin');
        Debug::remark('begin');
        $data = ['name' => '刘金生', 'sex' => rand(1,2),'status'=>1,'createtime'=>time()];
        $result = Db::name('user')
            ->data($data)
            ->insert();

        Debug::remark('end');
        echo Debug::getRangeTime('begin','end').'s';

//        $result = Db::name('user')->find();
//        Debug::remark('end');
//        echo Debug::getRangeTime('begin','end').'s';
        die;



        $array = [0, 1, 2];
        foreach ($array as &$val)
        {
            $val = 2;
            var_dump(current($array));
        }
        var_dump($array);
        die;

        phpinfo();
        die;

        list($array[], $array[], $array[]) = [1, 2, 3];
        var_dump($array);
        die;

//
//        dump(Config::get());
        dump(Config::get('app.app_debug'));

        die;
        $redis = new Redis(array('host'=>'127.0.0.1','port'=>'6379', 'timeout'=>'600'));
//        $redis->ping();
        $redis->set('name','刘金生','6379');
        print_r($redis->get('name'));
//

//        Cache::get('name');
//        Cache::store('redis')->set('name','value',3600);
//       print_r( Cache::get('name'));
//       die;


        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
