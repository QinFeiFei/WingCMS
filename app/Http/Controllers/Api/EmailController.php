<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Message\EmailMessageService;


class EmailController extends Controller
{
    public function send() {
        $type  = request('type', '');
        $email = request('email', '');
        $service = new EmailMessageService($type, $email);

        dd($service->send());
    }
}