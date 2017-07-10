<?php
namespace App\Services;

use App\Models\Tv;
use Illuminate\Http\Request;

class TvService {

    /**
     * 获取分页列表
     *
     */
    public function pageList (Request $request) {
        $model = Tv::orderBy('created_at', 'desc');

        // parseCondition
        $this->parseCondition($request, $model);

        $list = $model->paginate($request->get('pageSize', 10));
        return $list;
    }


    /**
     * 转换查询条件
     *
     *
     *
     */
    private function parseCondition (Request $request, &$model) {
        $tv_name = trim($request->get('tv_name', ''));
        if(!empty($tv_name)){
            $model = $model->where('tv_name', $tv_name);
        }

        $tv_type = intval($request->get('tv_type', 0));
        if(!empty($tv_type)){
            $model = $model->where('tv_type', $tv_type);
        }

        $tv_show_year = intval($request->get('tv_show_year', 0));
        if(!empty($tv_show_year)){
            $model = $model->where('tv_show_year', $tv_show_year);
        }

        $tv_lang = intval($request->get('tv_lang', 0));
        if(!empty($tv_lang)){
            $model = $model->where('tv_lang', $tv_lang);
        }

        $tv_area = trim($request->get('tv_area', ''));
        if(!empty($tv_area)){
            $model = $model->where('tv_area', $tv_area);
        }

        $created_at = $request->get('created_at');
        if(!empty($created_at)){
            dd($created_at[0]);
            dd(date('Y-m-d H:i:s', strtotime($created_at[0])));
            $model = $model->whereBetween('created_at', [1, 2]);
        }






    }





}