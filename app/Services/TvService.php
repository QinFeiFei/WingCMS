<?php
namespace App\Services;

use App\Tv;
use App\TvClassify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class TvService {

    public function findTv ($id) {
        $res = Tv::with('classifys')->find($id);
        $res->tv_actors = json_decode($res->tv_actors);

        return $res;
    }


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


    /**
     * 添加影视
     *
     * @param Request $request
     * @return bool
     */
    public function createTv (Request $request) {
        $fields = $request->get('formFields');
        $classifys = $request->get('classifys');

        try {
            DB::beginTransaction();
            $tv = Tv::create([
                'tv_name' => trim($fields['tv_name']),
                'tv_alias_name' => trim($fields['tv_alias_name']),
                'tv_brief' => trim($fields['tv_brief']),
                'tv_description' => trim($fields['tv_description']),
                'tv_type' => intval($fields['tv_type']),
                'tv_cover' => trim($fields['tv_cover']),
                'tv_show_date' => date('Y-m-d', strtotime($fields['tv_show_date'])),
                'tv_show_year' => date('Y', strtotime($fields['tv_show_year'])),
                'tv_lang' => intval($fields['tv_lang']),
                'tv_area' => intval($fields['tv_area']),
                'tv_actors' => Json::encode($fields['tv_actors'], 1),
                'tv_director' => trim($fields['tv_director']),
                'tv_minute' => intval($fields['tv_minute']),
                'tv_baidu_url' => trim($fields['tv_baidu_url']),
                'tv_baidu_pwd' => trim($fields['tv_baidu_pwd'])
            ]);

            $many = [];
            foreach ($classifys as $item) {
                $itemArr = explode('-', $item);
                $many[] = new TvClassify([
                    'classify_key' => $itemArr[0],
                    'classify_name' => $itemArr[1]
                ]);
            }
            $tv->classifys()->saveMany($many);

            DB::commit();
            return true;
        } catch(\Exception $e){
            DB::rollBack();
            return false;
        }
    }


    /**
     * 修改影视
     *
     * @param Request $request
     * @return bool
     */
    public function updateTv (Request $request) {
        $fields = $request->get('formFields');
        $classifys = $request->get('classifys');

        try {
            DB::beginTransaction();
            $model = Tv::findOrFail($fields['tv_id']);

            $model->tv_name = trim($fields['tv_name']);
            $model->tv_alias_name = trim($fields['tv_alias_name']);
            $model->tv_brief = trim($fields['tv_brief']);
            $model->tv_description = trim($fields['tv_description']);
            $model->tv_type = intval($fields['tv_type']);
            $model->tv_cover = trim($fields['tv_cover']);
            $model->tv_show_date = date('Y-m-d', strtotime($fields['tv_show_date']));
            $model->tv_show_year = date('Y', strtotime($fields['tv_show_year']));
            $model->tv_lang = intval($fields['tv_lang']);
            $model->tv_area = intval($fields['tv_area']);
            $model->tv_actors = Json::encode($fields['tv_actors'], 1);
            $model->tv_director = trim($fields['tv_director']);
            $model->tv_minute = intval($fields['tv_minute']);
            $model->tv_baidu_url = trim($fields['tv_baidu_url']);
            $model->tv_baidu_pwd = trim($fields['tv_baidu_pwd']);
            $model->save();

            // ---- 维护影视类型部分，可能写的有点复杂了...
            $many = [];
            $classify_keys = [];

            // 先查询出来所有类型
            $hasClassifys = TvClassify::select('classify_id', 'classify_key', 'classify_name')->where('tv_id', $fields['tv_id'])->get()->toArray();

            foreach ($classifys as $item) {
                $itemArr = explode('-', $item);
                $classify_keys[] = $itemArr[0];

                // 判断该类型是否已存在，存在则跳过
                if(deep_in_array($itemArr[0], $hasClassifys)) {
                    continue;
                }

                $many[] = new TvClassify([
                    'classify_key' => $itemArr[0],
                    'classify_name' => $itemArr[1]
                ]);
            }

            // 最后删除本次提交不存在的类型
            TvClassify::where('tv_id', $fields['tv_id'])->whereNotIn('classify_key', $classify_keys)->delete();

            // 添加不存在的类型
            $model->classifys()->saveMany($many);

            DB::commit();
            return true;
        } catch(\Exception $e){
            dd($e->getMessage());
            DB::rollBack();
            return false;
        }
    }
}