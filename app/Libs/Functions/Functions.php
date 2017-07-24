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

if(! function_exists('isIdCardNo')) {
    /**
     * 验证身份证号
     * @param $vStr
     * @return boolean
     */
    function isIdCardNo($vStr)
    {
        $vCity = array(
            '11', '12', '13', '14', '15', '21', '22',
            '23', '31', '32', '33', '34', '35', '36',
            '37', '41', '42', '43', '44', '45', '46',
            '50', '51', '52', '53', '54', '61', '62',
            '63', '64', '65', '71', '81', '82', '91'
        );

        if (!preg_match('/^([\d]{17}[xX\d]|[\d]{15})$/', $vStr)) return false;

        if (!in_array(substr($vStr, 0, 2), $vCity)) return false;

        $vStr = preg_replace('/[xX]$/i', 'a', $vStr);
        $vLength = strlen($vStr);

        if ($vLength == 18) {
            $vBirthday = substr($vStr, 6, 4) . '-' . substr($vStr, 10, 2) . '-' . substr($vStr, 12, 2);
        } else {
            $vBirthday = '19' . substr($vStr, 6, 2) . '-' . substr($vStr, 8, 2) . '-' . substr($vStr, 10, 2);
        }

        if (date('Y-m-d', strtotime($vBirthday)) != $vBirthday) return false;
        if ($vLength == 18) {
            $vSum = 0;

            for ($i = 17; $i >= 0; $i--) {
                $vSubStr = substr($vStr, 17 - $i, 1);
                $vSum += (pow(2, $i) % 11) * (($vSubStr == 'a') ? 10 : intval($vSubStr, 11));
            }

            if ($vSum % 11 != 1) return false;
        }

        return true;
    }
}

if(! function_exists('isMobile')) {
    /**
     * 验证手机号
     * @param $mobile
     * @return boolean
     */
    function isMobile($mobile)
    {
        $pattern = "/^(1(([357][0-9])|(47)|[8][01236789]))\d{8}$/";
        if(preg_match($pattern, $mobile))
            return true;
        else
            return false;

    }
}