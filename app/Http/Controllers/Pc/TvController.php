<?php
namespace App\Http\Controllers\Pc;


use Illuminate\Http\Request;

class TvController extends PcController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }


}