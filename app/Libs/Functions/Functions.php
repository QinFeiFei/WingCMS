<?php

if(! function_exists('output_data')){
    /**
     * 返回Json信息
     * @param $data
     * @param string $msg
     * @param int $code
     * @return array
     */
    function output_data($data, $msg='', $code=0) {
        $output = [
            $data,
            'code' => $code,
            'msg'  => $msg
        ];
        return $output;
    }
}

if(! function_exists('output_error')){
    /**
     * 返回Json错误信息
     * @param $errorMsg
     * @return array
     */
    function output_error($errorMsg) {
        return output_data([], $errorMsg, -100);
    }
}

if(! function_exists('output_success')){
    /**
     * 返回Json正确信息
     * @param $errorMsg
     * @return array
     */
    function output_success($msg) {
        return output_data([], $msg);
    }
}