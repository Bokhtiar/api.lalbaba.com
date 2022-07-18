<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        try {
            $results = Category::query()->Active()->get();
            return response()->json([
                "status" => true,
                "data" => $results
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "error" => $th->getMessage()
            ]);
        }
    }

    public function categoryWaysSubcategory(Request $request)
    {
        try {
            $resutls = SubCategory::where('category_id', $request->id)->Active()->get();
            return $this->SuccessResponse($resutls);
        } catch (\Throwable $th) {
            return $this->ErrorResponse($th->getMessage());
        }
        
        
    }
}
