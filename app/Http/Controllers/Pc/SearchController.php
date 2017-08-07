<?php
namespace App\Http\Controllers\Pc;

use App\Tv;

class SearchController extends PcController
{
    public function search () {
        $list = Tv::with('classifys')->where('tv_name', 'like', '%'.request('s', '').'%')->paginate(18);

        return view('pc.search')->with([
            'list' => $list
        ]);
    }
}