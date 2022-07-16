<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        try {
            $results = SubCategory::query()->Active()->with('category')->get(['sub_category_id', 'category_id', 'name', 'image', 'status']);
            return $this->SuccessResponse($results);
        } catch (\Throwable $th) {
            return $this->ErrorResponse($th->getMessage());
        }
    }
}
