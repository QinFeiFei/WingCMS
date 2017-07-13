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

        $list = $model->paginate($request->get('page_size', 10));
        return $list;
    }


    /**
     * 转换查询条件
     *
     */
    private function parseCondition (Request $request, &$model) {
        $tv_name = trim($request->get('tv_name', ''));
        if(!empty($tv_name)){
            $model = $model->where('tv_name', 'like', '%'.$tv_name.'%');
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
            $model = $model->whereBetween('created_at', [$created_at[0], $created_at[1]]);
        }
    }


    /**
     * 快速设置某个字段的值
     *
     * @param Request $request
     * @return mixed
     */
    public function setField (Request $request){
        $model = Tv::find($request->get('tv_id'));

        $field = $request->get('field');
        $value = $request->get('value');
        $model->$field = $value;
        return $model->save();
    }



}