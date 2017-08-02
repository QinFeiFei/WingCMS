<?php
namespace App\Services;

use App\Tv;
use App\TvClassify;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class TvService {

    private $model;

    public function __construct()
    {
        $this->model = new Tv();
    }

    /**
     * 查询影视详情
     *
     * @param $id 数据库ID
     * @param bool $idencrypt ID是否使用加密
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function findTv ($id, $id_encrypt = false) {
        if($id_encrypt) {
            $id = idDecode($id);
        }

        $res = Tv::with('classifys')->find($id);
        $res->tv_actors = json_decode($res->tv_actors);

        return $res;
    }


    /**
     * 获取分页列表
     *
     */
    public function pageList (Request $request, $pageSize = 10) {
        $model = new Tv();

        // parseCondition
        $this->parseCondition($request, $model);

        // parseSort
        $this->parseSort($request, $model);

        $list = $model->paginate($request->get('page_size', $pageSize));
        return $this->parseList($list);
    }


    /**
     * 获取指定长度数据
     *
     * @param Request $request
     * @param $model
     * @param int $take
     * @return mixed
     */
    public function getList (Request $request, $model, $take = 10) {
        $model = $model->orderBy('updated_at', 'desc');

        // parseCondition
        $this->parseCondition($request, $model);

        $list = $model->take($take)->get();
        return $this->parseList($list);
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

        $is_push = trim($request->get('is_push', ''));
        if($is_push !== '') {
            $model = $model->where('is_push', $is_push);
        }

        $tv_lang = intval($request->get('tv_lang', 0));
        if(!empty($tv_lang)){
            $model = $model->where('tv_lang', $tv_lang);
        }

        $tv_area = trim($request->get('tv_area', ''));
        if(!empty($tv_area)){
            $model = $model->where('tv_area', $tv_area);
        }

        $tv_show_year = trim($request->get('tv_show_year', ''));
        if(!empty($tv_show_year)){
            if(preg_match('/^\d{4}$/', $tv_show_year)){
                $model = $model->where('tv_show_year', $tv_show_year);
            }

            if($tv_show_year == '2010-2000'){
                $model = $model->whereBetween('tv_show_year', [2000, 2010]);
            }else if($tv_show_year == '2000-1990'){
                $model = $model->whereBetween('tv_show_year', [1990, 2000]);
            }else if($tv_show_year == '1990-1980'){
                $model = $model->whereBetween('tv_show_year', [1980, 1990]);
            }else if($tv_show_year == '1980-1970'){
                $model = $model->whereBetween('tv_show_year', [1970, 1980]);
            }else if($tv_show_year == '1970-'){
                $model = $model->where('tv_show_year', '<', 1970);
            }
        }

        $created_at = $request->get('created_at');
        if(!empty($created_at)){
            $model = $model->whereBetween('created_at', [$created_at[0], $created_at[1]]);
        }

        $classify = intval($request->get('classify', 0));
        if(!empty($classify)){
            $model->rightJoin('tv_classify', 'tv.tv_id', '=', 'tv_classify.tv_id')->where('tv_classify.classify_key', $classify);
        }else{
            $model->leftJoin('tv_classify', 'tv.tv_id', '=', 'tv_classify.tv_id')->groupBy('tv.tv_id');
        }
    }


    /**
     * 转换排序
     *
     * @param Request $request
     * @param $model
     */
    private function parseSort (Request $request, &$model) {
        $orderby = $request->get('orderby', '');
        if(empty($orderby)){
            $model->orderBy('tv.created_at', 'desc');
        }else if ($orderby == 'grade'){
            $model->orderBy('tv.tv_grade', 'desc');
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
        $value = $request->get('value', '');
        $model->$field = $value;

        try {
            return $model->save();
        } catch (\Exception $e) {
            logger($e->getMessage());
            return false;
        }
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
                'tv_baidu_pwd' => trim($fields['tv_baidu_pwd']),
                'tv_grade' => round($fields['tv_grade'], 1),
                'is_push' => trim($fields['is_push']),
                'tv_sort' => intval($fields['tv_sort'])
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
            $model->tv_grade = round($fields['tv_grade'], 1);
            $model->is_push = trim($fields['is_push']);
            $model->tv_sort = intval($fields['tv_sort']);
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


    /**
     * 将影视放入回收站
     *
     * @param $id
     * @return int
     */
    public function destoryTv ($id) {
        return Tv::destroy($id);
    }


    /**
     * 将影视永久删除
     *
     * @param $id
     * @return int
     */
    public function deleteTv ($id) {
        // $tvModel = Tv::find($id);
        // return Tv::forceDelete($id);
    }


    /**
     * 获取指定类型的相关影视
     *
     * @param Request $request
     * @param $type
     * @param $notId
     * @return mixed
     */
    public function relatesTv(Request $request, $type, $notId){
        request()->offsetSet('tv_type', $type);

        $model = $this->model;
        $model = $model->where('tv_id', '<>', $notId)->orderByRaw("RAND()");
        $list  = $this->getList($request, $model, 10);
        return $list;
    }


    /**
     * 获取当前分类下的推荐影视
     *
     * @param Request $request
     * @param $type
     * @param $notId
     * @return mixed
     */
    public function getPushs(Request $request, $notId){
        $model = $this->model;
        $model = $model->where('tv_id', '<>', $notId)->where('is_push', '1');
        $list  = $this->getList($request, $model, 10);
        return $list;
    }


    /**
     * 将数据库返回的List内容转换格式
     *
     * @param $list
     * @return mixed
     */
    public function parseList($list){
        $list->map(function ($item, $key) {
            return $item->tv_actors = json_decode($item->tv_actors);
        });
        return $list;
    }
}