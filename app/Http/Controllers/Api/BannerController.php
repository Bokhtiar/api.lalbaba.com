<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        try {
            $results = Banner::query()->Active()->get();
            return $this->SuccessResponse($results);
        } catch (\Throwable $th) {
            return $this->ErrorResponse($th->getMessage());
        }
    }
}
