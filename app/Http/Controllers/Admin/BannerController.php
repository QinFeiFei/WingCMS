<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Banner::orderBy('banner_id', 'desc')->paginate($request->get('page_size', 10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->get('formFields');
        $valid = $this->valid($fields);
        if(!$valid['state']){
            return output_error($valid['error']);
        }

        $banner = new Banner();
        $banner->banner_title = $fields['banner_title'];
        $banner->banner_src = $fields['banner_src'];
        $banner->banner_sort = $fields['banner_sort'];
        $banner->banner_url = $fields['banner_url'];
        $banner->banner_bgcolor = $fields['banner_bgcolor'];
        if($banner->save()){
            return output_success('保存成功');
        }else{
            return output_error('服务器异常');
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
        return Banner::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $fields = $request->get('formFields');
        $valid = $this->valid($fields);
        if(!$valid['state']){
            return output_error($valid['error']);
        }

        $banner = Banner::find($id);
        if(!$banner){
            return output_error('Banner不存在');
        }

        $banner->banner_title = $fields['banner_title'];
        $banner->banner_src = $fields['banner_src'];
        $banner->banner_sort = $fields['banner_sort'];
        $banner->banner_url = $fields['banner_url'];
        $banner->banner_bgcolor = $fields['banner_bgcolor'];
        if($banner->save()){
            return output_success('保存成功');
        }else{
            return output_error('服务器异常');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Banner::destroy($id)){
            return output_success('删除成功');
        }else{
            return output_error('服务器异常');
        }
    }


    public function valid($formFields){
        $validArr = [ 'state' => true, 'error' => '' ];
        $validator = Validator::make($formFields, [
            'banner_title' => 'required',
            'banner_sort' => 'min:0,max:255',
            'banner_url' => 'url'
        ], [
            'banner_title.required' => 'Banner标题必填!',
            'banner_sort.min' => '排序必须为0-255!',
            'banner_sort.max' => '排序必须为0-255!',
            'banner_url.url' => '地址格式错误!'
        ]);

        if ($validator->fails()) {
            $validArr['state'] = false;
            $validArr['error'] = $validator->errors()->first();
        }
        return $validArr;
    }


    public function upload(Request $request){
        $file = $request->file('banner_src');
        $hashname = $file->hashName();

        Storage::putFileAs('public/banner', $file, $hashname);

        return output_data('/storage/banner/'. $hashname);
    }
}
