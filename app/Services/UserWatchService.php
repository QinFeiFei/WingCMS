<?php
namespace App\Services;

use App\UserWatch;
use Crypt;

class UserWatchService {

    /**
     * 登录之后把cookie中的浏览记录存入数据库
     */
    public function mergebrowse($user_id){
        if(isset($_COOKIE['viewed'])){
            $viewedArray = Crypt::decrypt($_COOKIE['viewed']);

            if (! empty($viewedArray)){
                foreach ($viewedArray as $view){
                    echo $view['tv_id'];
                    $this->addViewedToDatabase($view['tv_id'], $user_id);
                }
            }

            //最后清空浏览记录cookie
            setcookie('viewed', '', -3600, '/');
        }
    }


    /**
     * 浏览过的影视
     *
     * @param int $member_id 会员ID（一般传递$_SESSION['member_id']）
     * @param int $shownum 查询的条数，默认0则为返回全部
     * @return array
     */
    public function addViewedGoods($tv_id, $user_id = 0) {
        // 将浏览记录添加至 cookie
        if($user_id <= 0){
            $this->addViewedToCookie($tv_id);
        }

        // 登录后将浏览历史记录至数据库
        if($user_id > 0){
            $this->addViewedToDatabase($tv_id, $user_id);
        }
    }


    /**
     * 浏览过的影视加入浏览历史数据库
     *
     * @param mixed $tv_id 影视ID
     * @param int $user_id 会员ID
     * @return array
     */
    public function addViewedToDatabase($tv_id, $user_id) {
        // 查看数据库中是否有这件记录
        $viewed = UserWatch::where('user_id', $user_id)->where('tv_id', $tv_id)->first();
        if($viewed){
            $viewed->watch_nums = $viewed->watch_nums + 1;
        }else{
            $viewed = new UserWatch();
            $viewed->user_id = $user_id;
            $viewed->tv_id   = $tv_id;
            $viewed->watch_nums = 1;
        }
        $viewed->save();
    }


    /**
     * 浏览过的影视加入浏览历史数据库
     *
     * @param mixed $goods_id 影视ID或者影视ID数组
     * @return array
     */
    public function addViewedToCookie($tv_id){
        // 构造cookie的一项值，每项cookie的值为影视ID-访问时间
        $viewed   = [];
        $viewed[0]['tv_id'] = $tv_id;
        $viewed[0]['viewd_time'] = date('Y-m-d H:i:s', time());

        if (isset($_COOKIE['viewed'])) { //如果cookie已经存在
            $viewedArray = Crypt::decrypt($_COOKIE['viewed']);

            foreach ($viewedArray as $k=>$view) {
                if ($view['tv_id'] == $tv_id) { //如果该影视的浏览记录已经存在，则删除它
                    unset($viewedArray[$k]);
                }
            }

            // 将新浏览历史加入cookie末尾
            array_push($viewedArray, $viewed[0]);

            // cookie中最多存储50条浏览信息
            if (count($viewedArray) > 50) {
                $vg_ca = array_slice($viewedArray, 0, 50);
            }else{
                $vg_ca = $viewedArray;
            }
        } else {
            $vg_ca = $viewed;
        }

        $str = Crypt::encrypt($vg_ca);
        setcookie('viewed', $str, time()+315360000, '/');
    }
}