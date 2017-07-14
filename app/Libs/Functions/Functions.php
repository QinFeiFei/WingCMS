<?php

if(! function_exists('deep_in_array')) {
    /**
     * 查看多维数据是否存在某个值
     *
     * @param $value
     * @param $array
     * @param bool $case_insensitive 是否区分大小写
     * @return bool
     */
    function deep_in_array($value, $array, $case_insensitive = false)
    {
        foreach ($array as $item) {
            if (is_array($item)) $ret = deep_in_array($value, $item, $case_insensitive);
            else $ret = ($case_insensitive) ? strtolower($item) == $value : $item == $value;
            if ($ret) return $ret;
        }
        return false;
    }
}

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
            'result' => $data,
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