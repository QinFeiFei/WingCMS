<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Json;
use Validator;

class PcController extends Controller
{
    public function clearCache () {
        $group = request('clearGroup', []);
        foreach ($group as $item) {
            Cache::forget($item);
        }

        return output_success('clear success');
    }
}
