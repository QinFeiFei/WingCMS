<?php

namespace App\Http\Controllers\Pc;

use App\UserWatch;

class UserWatchController extends PcController
{
    public function index () {
        $list = UserWatch::with('tv')->where('user_id', $this->getUser()->user_id)->orderBy('watch_id', 'desc')->paginate(12);
        return view('pc.user.watch')->with(['list' => $list]);
    }

    public function delete () {
        $rs = UserWatch::where('watch_id', request()->get('id', 0))->delete();
        if($rs){
            return output_success('删除成功');
        }else{
            return output_error('删除失败');
        }
    }
}