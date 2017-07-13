<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tv;
use App\Services\TvService;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tv_id' => 'exists:tv,tv_id',
            'field' => 'required',
            'value' => 'required'
        ]);

        if ($validator->fails()) {
            output_error("数据不完整.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 设置某个字段的值
     *
     * @return Json
     */
    public function setField(Request $request, TvService $service){
        $validator = Validator::make($request->all(), [
            'tv_id' => 'exists:tv,tv_id',
            'field' => 'required',
            'value' => 'required'
        ]);

        if ($validator->fails()) {
            output_error("数据不完整.");
        }

        if($service->setField($request))
            output_success("更新成功.");
        else
            output_error("更新失败");
    }
}
