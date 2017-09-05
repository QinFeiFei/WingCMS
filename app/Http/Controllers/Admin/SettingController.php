<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function emailTest () {
        $emailSetting = [];

        $emailSetting['MAIL_DRIVER'] = env('MAIL_DRIVER');
        $emailSetting['MAIL_HOST'] = env('MAIL_HOST');
        $emailSetting['MAIL_PORT'] = env('MAIL_PORT');
        $emailSetting['MAIL_USERNAME'] = env('MAIL_USERNAME');
        $emailSetting['MAIL_PASSWORD'] = env('MAIL_PASSWORD');
        $emailSetting['MAIL_ENCRYPTION'] = env('MAIL_ENCRYPTION');
        $emailSetting['MAIL_FROM_ADDRESS'] = env('MAIL_FROM_ADDRESS');
        $emailSetting['MAIL_FROM_NAME'] = env('MAIL_FROM_NAME');

        return output_data($emailSetting);
    }
}
