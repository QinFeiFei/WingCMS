<?php

namespace App\Http\Controllers\Pc;

use App\UserCollect;

class UserCollectController extends PcController
{
    public function index () {
        $list = UserCollect::with('tv')->where('user_id', $this->getUser()->user_id)->orderBy('collect_id', 'desc')->paginate(12);

        return view('pc.user.collect')->with(['list' => $list]);
    }


    public function delete () {
        $rs = UserCollect::where('collect_id', request()->get('id', 0))->delete();
        if($rs){
            return output_success('删除成功');
        }else{
            return output_error('删除失败');
        }
    }

    public function create (){
        $collect = new UserCollect();
        $collect->user_id = $this->getUser()->user_id;
        $collect->tv_id = request()->get('tv_id');
        $rs = $collect->save();
        if($rs){
            return output_success('收藏成功');
        }else{
            return output_error('收藏失败');
        }
    }

}