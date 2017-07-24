<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\TvService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Psy\Util\Json;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, TvService $service)
    {
        $list = $service->pageList($request);
        return $list;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TvService $service)
    {
        $validBack = $this->valid($request);
        if(! $validBack['state']){ return output_error($validBack['error']); }

        if( $service->createTv($request) )
            return output_success("添加成功");
        else
            return output_error("添加失败");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, TvService $service)
    {
        return $service->findTv($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TvService $service, $id)
    {
        $validBack = $this->valid($request);
        if(! $validBack['state']){ return output_error($validBack['error']); }

        if( $service->updateTv($request) )
            return output_success("修改成功");
        else
            return output_error("修改失败");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, TvService $tvService)
    {
        if($tvService->destoryTv($id)) {
            return output_success('删除成功');
        }else{
            return output_error('服务器处理失败.');
        }
    }

    public function delete(TvService $tvService){
        // 暂时不做强制删除接口

    }

    /**
     * 插入或更新数据时，验证字段
     *
     * @param Request $request
     * @return array
     */
    private function valid(Request $request) {
        $validArr = [ 'state' => true, 'error' => '' ];
        $validator = Validator::make($request->get('formFields'), [
            'tv_name' => 'required',
            'tv_type' => 'required|Integer',
            'tv_lang' => 'Integer',
            'tv_area' => 'Integer',
            'tv_minute' => 'Integer',
        ], [
            'tv_name.required' => '影视名称必填!',
            'tv_type.required' => '影视分类必填!',
            'tv_type.integer' => '影视分类格式异常!',
            'tv_lang.integer' => '影视语言格式异常!',
            'tv_area.integer' => '影视地区格式异常!',
            'tv_minute.integer' => '影视时长格式异常!',
        ]);

        if ($validator->fails()) {
            $validArr['state'] = false;
            $validArr['error'] = $validator->errors()->first();
        }
        return $validArr;
    }

    /**
     * 设置某个字段的值
     *
     * @return Json
     */
    public function setField(Request $request, TvService $service){
        $validator = Validator::make($request->all(), [
            'tv_id' => 'required|exists:tv,tv_id',
            'field' => 'required',
            'value' => 'required'
        ]);

        if ($validator->fails()) {
            return output_error("数据不完整.");
        }

        if($service->setField($request) === true){
            return output_success("更新成功.");
        } else {
            return output_error("更新失败");
        }
    }

    /**
     * 上传影视封面图片
     *
     * @param Request $request
     * @return String
     */
    public function uploadCover (Request $request) {
        $file = $request->file('tv_cover');
        $hashname = $file->hashName();

        Storage::putFileAs('public/tv', $file, $hashname);

        return output_data('tv/'. $hashname);
    }
}
